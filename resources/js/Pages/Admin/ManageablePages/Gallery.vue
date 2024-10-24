<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import GallerySectionCard from '../../../Components/GallerySectionCard.vue';
  import { useForm, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';

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
    </section>

    <section class="gallery-sections">
      <h2>Sekcje galerii</h2>
      <div v-if="gallerySections?.length > 0" class="sections-list">
        <GallerySectionCard v-for="section in gallerySections" :photos :section />
      </div>
      <div v-else class="no-sections">Brak dodanych sekcji</div>
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

  .form-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
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

  .primary-button:hover {
    background-color: #1d4ed8;
  }

  /* Styling for the gallery section list */
  .gallery-sections {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .sections-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
  }

  .no-sections {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
  }
</style>
