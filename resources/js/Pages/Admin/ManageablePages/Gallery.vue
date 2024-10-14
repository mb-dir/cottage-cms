<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm } from '@inertiajs/vue3';

  const props = defineProps({
    photos: { required: true, type: Array },
  });

  // Bind the selected photo IDs
  const form = useForm({
    photos: props.photos.filter(photo => photo.is_gallery).map(photo => photo.id), // Only store IDs
  });

  function onSubmit() {
    form.put(route('admin.gallery.update'));
  }
</script>

<template>
  <AdminLayout>
    <h2>Wybierz zdjęcia które mają pojawić się w galerii</h2>

    <div class="gallery">
      <form v-if="photos?.length > 0" @submit.prevent="onSubmit">
        <div class="gallery__container">
          <div v-for="photo in photos" :key="photo.id" class="photo">
            <img :src="photo.src" alt="Zdjęcie">
            <!-- Bind checkbox to photo ID -->
            <input v-model="form.photos" :value="photo.id" class="photo__checkbox" type="checkbox">
          </div>
        </div>
        <button>Zapisz</button>
      </form>
      <div v-else>Brak zdjęć do wyboru</div>
    </div>
  </AdminLayout>
</template>
<style scoped>
  .gallery__container {
    display: grid;
    grid-template-columns: repeat(4, minmax(150px, 1fr));
    grid-template-rows: 200px;
    gap: 16px;
    padding: 16px;
  }

  .gallery__container img {
    width: 100%;
    object-fit: cover;
    height: 200px;
  }

  .photo {
    position: relative;
  }

  .photo__checkbox {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 20px;
    height: 20px;
  }
</style>