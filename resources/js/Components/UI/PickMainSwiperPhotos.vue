<script setup>
  import Button from './Button.vue';
  import Modal from './Modal.vue';
  import { ref, computed } from 'vue';
  import PhotoGridWithCheckboxes from './PhotoGridWithCheckboxes.vue';
  import { useForm, usePage } from '@inertiajs/vue3';

  const props = defineProps({
    photos: { required: true, type: Array },
    swiperPhotos: { required: true, type: Array },
  });

  const adminMenu = usePage().props.admin_menu;

  const currentPageId = computed(() => {
    const foundItem = adminMenu.find((item) => item.route_admin_name === route().current());
    return foundItem ? foundItem.id : null;
  });

  const htmlModal = ref(null);

  const form = useForm({
    photos: props.swiperPhotos || [],
    page_id: currentPageId,
  });

  function openModal() {
    htmlModal.value.show();
  }

  function onSubmit() {
    form.post(route('admin.manageable-photos.store'), { onSuccess: htmlModal.value.close() });
  }
</script>

<template>
  <Button @click="openModal">Wybierz zdjęcia dla Swipera na stronie</Button>

  <Modal ref="htmlModal">
    <form @submit.prevent="onSubmit">
      <h2 class="title">Wybrane zdjęcia będą wyświetlane na danej stronie w głównym swiperze</h2>

      <PhotoGridWithCheckboxes v-model="form.photos" :photos />
      <Button>Zapisz</Button>
    </form>
  </Modal>
</template>

<style scoped>
  .title {
    text-align: center;
  }
</style>