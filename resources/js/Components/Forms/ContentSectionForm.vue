<script setup>
  import Button from '../UI/Button.vue';
  import Input from './Controls/Input.vue';
  import { useForm, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';
  import CKTextEditor from './Controls/CKTextEditor.vue';

  const adminMenu = usePage().props.admin_menu;

  const currentPageId = computed(() => {
    const foundItem = adminMenu.find((item) => item.route_admin_name === 'admin.gallery.index');
    return foundItem ? foundItem.id : null;
  });

  const form = useForm({
    title: '',
    content: '',
    page_id: currentPageId.value,
  });

  function onSubmit() {
    form.post(route('admin.content-section.store'), { preserveState: false });
  }

</script>

<template>
  <section class="form-section">
    <h2>Dodaj sekcje</h2>

    <form class="form-section__form" @submit.prevent="onSubmit">
      <Input v-model="form.title" label="Tytuł sekcji" />
      <CKTextEditor v-model="form.content" label="Opis sekcji" />

      <Button>Zapisz</Button>
    </form>
  </section>
</template>

<style scoped>
  .form-section {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .form-section__form {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
</style>