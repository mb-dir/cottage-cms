<script setup>
  import { router, useForm } from '@inertiajs/vue3';
  import Modal from '../../UI/Modal.vue';
  import { ref } from 'vue';
  import Button from '../../UI/Button.vue';
  import Input from '../../Forms/Controls/Input.vue';
  import Textarea from '../../Forms/Controls/Textarea.vue';
  import PhotoGridWithCheckboxes from '../../UI/PhotoGridWithCheckboxes.vue';

  const props = defineProps({ section: { type: Object, required: true }, photos: { type: Array, required: true } });

  const modal = ref(null);

  const form = useForm({
    title: props.section.title,
    content: props.section.content,
    // photos from section have pivot cuz of loaded relation, photos passed as props(represents all available photos to add) have to pivot key, and that was the reason why in PhotoGridWithCheckboxes v-model didn't match any element
    photos: props.section.photos?.map(({ pivot, ...rest }) => rest),
  });

  function onSectionDelete(gallerySection) {
    router.delete(route('admin.gallery-section.destroy', { gallerySection }));
  }

  function openModal() {
    modal.value.show();
  }

  function closeModal() {
    modal.value.close();
  }

  function onSubmit() {
    form.put(
      route('admin.gallery-section.update', { gallerySection: props.section }),
      {
        onSuccess: () => closeModal(),
      },
    );
  }
</script>

<template>
  <Modal ref="modal">
    <form class="form-container" @submit.prevent="onSubmit">
      <Input v-model="form.title" label="Tytuł sekcji" />
      <Textarea v-model="form.content" label="Opis sekcji" />
      <span>Wybierz zdjęcia przypisane do sekcji</span>
      <PhotoGridWithCheckboxes v-model="form.photos" :photos />

      <Button>Zapisz</Button>
    </form>
  </Modal>
  <div class="section-card">
    <h3 class="section-card__title">{{ section.title }}</h3>
    <p class="section-card__content">{{ section.content }}</p>

    <div class="section-card__buttons">
      <Button @click="openModal">Edytuj</Button>
      <Button type="delete" @click="onSectionDelete(section)">Usuń</Button>
    </div>
  </div>
</template>

<style scoped>
  .section-card {
    padding: 15px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    transition: box-shadow 0.3s ease;
  }

  .section-card__title {
    margin: 0;
  }

  .section-card__content {
    font-size: 14px;
    margin-bottom: 28px;
  }

  .section-card__buttons {
    display: flex;
    justify-content: space-between;
  }

</style>