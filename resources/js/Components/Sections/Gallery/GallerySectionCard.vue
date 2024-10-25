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
    photos: props.section.photos,
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
      <PhotoGridWithCheckboxes v-model="form.photos" :photos />

      <Button>Zapisz</Button>
    </form>
  </Modal>
  <div class="section-card">
    <h3>{{ section.title }}</h3>
    <p>{{ section.content }}</p>

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

  .section-card h3 {
    margin-bottom: 10px;
    font-size: 18px;
  }

  .section-card p {
    font-size: 14px;
    margin-bottom: 10px;
  }

  .section-card__buttons {
    display: flex;
    justify-content: space-between;
  }

</style>