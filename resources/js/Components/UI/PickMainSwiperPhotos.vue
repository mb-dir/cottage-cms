<script setup>
  import Button from './Button.vue';
  import Modal from './Modal.vue';
  import { ref, computed } from 'vue';
  import PhotoGridWithCheckboxes from './PhotoGridWithCheckboxes.vue';
  import { useForm, usePage } from '@inertiajs/vue3';

  defineProps({
    photos: { required: true, type: Array },
  });

  const adminMenu = usePage().props.admin_menu;

  const currentPageId = computed(() => {
    const foundItem = adminMenu.find((item) => item.route_admin_name === 'admin.gallery.index');
    return foundItem ? foundItem.id : null;
  });

  const htmlModal = ref(null);

  const form = useForm({
    photos: [],
  });

  function openModal() {
    htmlModal.value.show();
  }
</script>

<template>
  <Button @click="openModal">Wybierz zdjęcia dla Swipera na stronie</Button>

  <Modal ref="htmlModal">
    <form>
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