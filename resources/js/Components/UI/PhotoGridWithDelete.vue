<script setup>
  import { Link, router } from '@inertiajs/vue3';
  import Button from './Button.vue';

  const props = defineProps({
    photos: { type: Array, required: true },
  });

  const model = defineModel({ type: Array });

  function onPhotoDelete(photo) {
    if (confirm('Czy jesteś pewnien?')) {
      router.delete(route('admin.photo.destroy', { photo }));
    }
  }
</script>

<template>
  <div v-if="photos.length > 0" class="photos-grid">
    <div v-for="photo in photos" class="photos-grid__item">
      <Button class="photos-grid__delete" type="delete" @click="onPhotoDelete(photo)">X</Button>
      <img :src="photo.src" alt="Gallery photo" class="photos-grid__img" />
    </div>
  </div>
  <div v-else class="no-photo">
    Brak zdjęć do wyboru,
    <Link :href="route('admin.photo.index')" class="no-photo__link">dodaj zdjęcia</Link>
  </div>
</template>

<style scoped>
  .photos-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr); /* 3 equal columns */
    gap: 10px; /* Space between photos */
    padding: 10px; /* Padding around the grid */
  }

  .photos-grid__item {
    width: 100%;
    height: 150px; /* Fixed height for uniformity */
    overflow: hidden; /* Prevent images from overflowing */
    border-radius: 8px; /* Rounded corners for the photos */
    position: relative;
  }

  .photos-grid__delete {
    position: absolute;
    top: 8px;
    right: 8px;
  }

  .photos-grid__img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio, cover the container */
    border-radius: 8px; /* Apply rounded corners to images */
  }

  .no-photo {
    padding: 2rem;
    text-align: center;
  }

  .no-photo__link {
    text-decoration: underline;
  }
</style>