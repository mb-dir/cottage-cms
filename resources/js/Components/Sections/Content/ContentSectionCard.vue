<script setup>
  import { router, useForm } from '@inertiajs/vue3';
  import Modal from '../../UI/Modal.vue';
  import { ref } from 'vue';
  import Button from '../../UI/Button.vue';
  import Input from '../../Forms/Controls/Input.vue';
  import 'ckeditor5/ckeditor5.css';
  import CKTextEditor from '../../Forms/Controls/CKTextEditor.vue';

  const props = defineProps({ section: { type: Object, required: true } });

  const modal = ref(null);

  const form = useForm({
    title: props.section.title,
    content: props.section.content,
  });

  // TODO - cke editor integration
  function onSectionDelete(contentSection) {
    router.delete(route('admin.content-section.destroy', { contentSection }));
  }

  function openModal() {
    modal.value.show();
  }

  function closeModal() {
    modal.value.close();
  }

  function onSubmit() {
    form.put(
      route('admin.content-section.update', { contentSection: props.section }),
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
      <CKTextEditor v-model="form.content" label="Opis sekcji" />
      <Button>Zapisz</Button>
    </form>
  </Modal>
  <div class="section-card">
    <h3 class="section-card__title">{{ section.title }}</h3>
    <p class="section-card__content" v-html="section.content" />

    <div class="section-card__buttons">
      <Button @click="openModal">Edytuj</Button>
      <Button type="delete" @click="onSectionDelete(section)">Usuń</Button>
    </div>
  </div>
</template>

<style scoped>
  .form-container {
    width: 100%;
  }

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