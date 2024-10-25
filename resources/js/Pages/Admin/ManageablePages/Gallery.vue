<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import GallerySectionCard from '../../../Components/Sections/Gallery/GallerySectionCard.vue';
  import { useForm, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';
  import Button from '../../../Components/UI/Button.vue';
  import Input from '../../../Components/Forms/Controls/Input.vue';
  import Textarea from '../../../Components/Forms/Controls/Textarea.vue';
  import PhotoGridWithCheckboxes from '../../../Components/UI/PhotoGridWithCheckboxes.vue';

  defineProps({
    photos: { required: true, type: Array },
    gallerySections: { required: true, type: Array },
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
    form.post(route('admin.gallery-section.store'));
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

    <section class="gallery-sections">
      <h2>Sekcje galerii</h2>
      <div v-if="gallerySections?.length > 0" class="gallery-sections__list">
        <GallerySectionCard v-for="section in gallerySections" :photos :section />
      </div>
      <div v-else class="gallery-sections__no-sections">Brak dodanych sekcji</div>
    </section>
  </AdminLayout>
</template>

<style scoped>
  /* General form styling */
  .form-section {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
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
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
  }

  .gallery-sections__no-sections {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
  }
</style>
