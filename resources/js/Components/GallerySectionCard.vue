<script setup>
  import { router } from '@inertiajs/vue3';
  import Modal from './Modal.vue';
  import { ref } from 'vue';

  defineProps({ section: { type: Object, required: true } });

  const modal = ref(null);

  function onSectionDelete(gallerySection) {
    router.delete(route('admin.gallery-section.destroy', { gallerySection }));
  }

  function openModal() {
    modal.value.show();
  }
</script>

<template>
  <Modal ref="modal">{{ section.title }}</Modal>
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

</style>