<script setup>
  import { router, useForm } from '@inertiajs/vue3';
  import Modal from '../../UI/Modal.vue';
  import { ref } from 'vue';
  import Button from '../../UI/Button.vue';

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
      <div class="form-group">
        <label for="title">Tytuł sekcji</label>
        <input id="title" v-model="form.title" class="input-field" placeholder="Tytuł sekcji" type="text" />
      </div>

      <div class="form-group">
        <label for="content">Opis sekcji</label>
        <textarea id="content" v-model="form.content" class="textarea-field" placeholder="Opis sekcji"></textarea>
      </div>

      <div v-if="photos.length > 0" class="photos-grid">
        <div v-for="photo in photos" class="photo-item">
          <input v-model="form.photos" :value="photo" class="photo-checkbox" type="checkbox">
          <img :src="photo.src" alt="" class="photo-img" />
        </div>
      </div>

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

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  label {
    font-weight: 500;
  }

  .input-field,
  .textarea-field {
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 16px;
    background-color: #fff;
    transition: border-color 0.3s ease;
  }

  .input-field:focus,
  .textarea-field:focus {
    border-color: #2563eb;
    outline: none;
  }

  .textarea-field {
    min-height: 100px;
  }

  .photos-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 equal columns */
    gap: 10px; /* Space between photos */
    padding: 10px; /* Padding around the grid */
  }

  .photo-item {
    width: 100%;
    height: 200px; /* Fixed height for uniformity */
    overflow: hidden; /* Prevent images from overflowing */
    border-radius: 8px; /* Rounded corners for the photos */
    position: relative;
  }

  .photo-checkbox {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 20px;
    height: 20px;
  }

  .photo-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio, cover the container */
    border-radius: 8px; /* Apply rounded corners to images */
  }

  .section-card__buttons {
    display: flex;
    justify-content: space-between;
  }

</style>