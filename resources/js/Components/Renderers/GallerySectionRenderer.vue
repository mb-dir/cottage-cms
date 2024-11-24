<script setup>
  import { ref } from 'vue';
  import VueEasyLightbox from 'vue-easy-lightbox';

  const props = defineProps({
    section: { required: true, type: Object },
  });

  const visibleRef = ref(false);
  const indexRef = ref(0); // default 0
  const activeImgsRef = ref([]);

  // Function to show the lightbox
  const onShow = () => {
    visibleRef.value = true;
  };

  // Show multiple images
  const showMultiple = (index) => {
    activeImgsRef.value = props.section.photos;
    indexRef.value = index;
    onShow();
  };

  // Function to hide the lightbox
  const onHide = () => {
    visibleRef.value = false;
  };
</script>

<template>
  <div>
    <vue-easy-lightbox
      :imgs="activeImgsRef"
      :index="indexRef"
      :visible="visibleRef"
      @hide="onHide"
    ></vue-easy-lightbox>
  </div>
  <section class="section">
    <h2>{{ section.title }}</h2>
    <p>{{ section.content }}</p>
    <div v-if="section.photos?.length" class="image-grid">
      <img
        v-for="(photo, index) in section.photos"
        :key="index"
        :src="photo.src"
        alt="Image"
        class="image-item"
        @click="showMultiple(index)"
      />
    </div>
  </section>
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