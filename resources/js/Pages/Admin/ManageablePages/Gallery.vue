<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';

  defineProps({
    photos: { required: true, type: Array },
  });

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
    form.post(route('admin.gallery-section.store'));
  }

</script>

<template>
  <AdminLayout>
    <h2>Dodaj sekcje galerii</h2>

    <form @submit.prevent="onSubmit">
      <input v-model="form.title" placeholder="Tytuł sekcji" type="text">
      <textarea v-model="form.content" placeholder="Opis sekcji"></textarea>
      <button>Zapisz</button>
    </form>

  </AdminLayout>
</template>
<style scoped>

</style>