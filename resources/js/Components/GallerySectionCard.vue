<script setup>
  import { router, useForm } from '@inertiajs/vue3';
  import Modal from './Modal.vue';
  import { ref } from 'vue';

  const props = defineProps({ section: { type: Object, required: true } });

  const modal = ref(null);

  const form = useForm({
    title: props.section.title,
    content: props.section.content,
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

      <button class="primary-button" type="submit">Zapisz</button>
    </form>
  </Modal>
  <div class="section-card">
    <h3>{{ section.title }}</h3>
    <p>{{ section.content }}</p>

    <button class="edit-button" @click="openModal">Edytuj</button>
    <button class="delete-button" @click="onSectionDelete(section)">Usuń</button>
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

  .edit-button {
    background-color: #10b981;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }

  .edit-button:hover {
    background-color: #059669;
  }

  .delete-button {
    background-color: #b91010;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }

  .delete-button:hover {
    background-color: #e70d0d;
  }

  .form-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
  }

  .primary-button {
    background-color: #2563eb;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
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

</style>