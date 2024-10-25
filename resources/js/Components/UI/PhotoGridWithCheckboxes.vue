<script setup>
  import { Link } from '@inertiajs/vue3';

  const props = defineProps({
    photos: { type: Array, required: true },
  });

  const model = defineModel({ type: Array });
</script>

<template>
  <div v-if="photos.length > 0" class="photos-grid">
    <div v-for="photo in photos" class="photos-grid__item">
      <input v-model="model" :value="photo" class="photos-grid__checkbox" type="checkbox">
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
    height: 110px; /* Fixed height for uniformity */
    overflow: hidden; /* Prevent images from overflowing */
    border-radius: 8px; /* Rounded corners for the photos */
    position: relative;
  }

  .photos-grid__checkbox {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 16px;
    height: 16px;
  }

  .photos-grid__checkbox:hover {
    cursor: pointer;
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