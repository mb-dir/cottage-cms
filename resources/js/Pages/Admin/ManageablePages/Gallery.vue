<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';
  import Button from '../../../Components/UI/Button.vue';
  import Input from '../../../Components/Forms/Controls/Input.vue';
  import Textarea from '../../../Components/Forms/Controls/Textarea.vue';
  import PhotoGridWithCheckboxes from '../../../Components/UI/PhotoGridWithCheckboxes.vue';
  import SectionsGrid from '../Partial/SectionsGrid.vue';
  import PreviewRenderer from '../../../Components/Renderers/PreviewRenderer/PreviewRenderer.vue';

  defineProps({
    photos: { required: true, type: Array },
    sections: { required: true, type: Array },
  });

  const adminMenu = usePage().props.admin_menu;

  const currentPageId = computed(() => {
    const foundItem = adminMenu.find((item) => item.route_admin_name === 'admin.gallery.index');
    return foundItem ? foundItem.id : null;
  });

  const form = useForm({
    title: '',
    content: '',
    photos: [],
    page_id: currentPageId.value,
  });

  function onSubmit() {
    form.post(route('admin.gallery-section.store'), { preserveState: false });
  }

</script>

<template>
  <AdminLayout>
    <section class="form-section">
      <h2>Dodaj sekcje galerii</h2>

      <form class="form-section__form" @submit.prevent="onSubmit">
        <Input v-model="form.title" label="Tytuł sekcji" />
        <Textarea v-model="form.content" label="Opis sekcji" />
        <span>Wybierz zdjęcia przypisane do sekcji</span>
        <PhotoGridWithCheckboxes v-model="form.photos" :photos />

        <Button>Zapisz</Button>
      </form>
    </section>

    <SectionsGrid :photos :sections />

    <PreviewRenderer :sections :src="route('client.gallery.index')" />
  </AdminLayout>
</template>

<style scoped>
  /* General form styling */
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

  /* Styling for the gallery section list */
  .gallery-sections {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .gallery-sections__list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .gallery-sections__no-sections {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
  }
</style>
