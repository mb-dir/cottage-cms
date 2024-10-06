<script setup>
  import { ref } from 'vue';
  import ClientLayout from '../../Layouts/ClientLayout.vue';
  import VueEasyLightbox from 'vue-easy-lightbox';

  const visibleRef = ref(false);
  const indexRef = ref(0); // default 0
  const activeImgsRef = ref([]);
  const imgs = ['http://via.placeholder.com/350x150', 'http://via.placeholder.com/250x150', 'http://via.placeholder.com/350x250', 'http://via.placeholder.com/350x150', 'http://via.placeholder.com/150x100', 'http://via.placeholder.com/250x150', 'http://via.placeholder.com/350x250', 'http://via.placeholder.com/350x150'];

  // Function to show the lightbox
  const onShow = () => {
    visibleRef.value = true;
  };

  // Show multiple images
  const showMultiple = (index) => {
    activeImgsRef.value = imgs;
    indexRef.value = index;
    onShow();
  };

  // Function to hide the lightbox
  const onHide = () => {
    visibleRef.value = false;
  };
</script>

<template>
  <ClientLayout>
    <div>
      <vue-easy-lightbox
        :imgs="activeImgsRef"
        :index="indexRef"
        :visible="visibleRef"
        @hide="onHide"
      ></vue-easy-lightbox>
    </div>
    <div class="image-grid">
      <img
        v-for="(photo, index) in imgs"
        :key="index"
        :src="photo"
        alt="Image"
        class="image-item"
        @click="showMultiple(index)"
      />
    </div>
  </ClientLayout>
</template>

<style scoped>
  .image-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(150px, 1fr));
    gap: 10px;
    padding: 10px;
  }

  .image-item {
    width: 100%;
    height: auto;
    cursor: pointer;
    border: 2px solid #ddd;
    transition: transform 0.3s ease;
    max-height: 200px;
    object-fit: cover;
  }

  .image-item:hover {
    transform: scale(1.05);
  }
</style>
