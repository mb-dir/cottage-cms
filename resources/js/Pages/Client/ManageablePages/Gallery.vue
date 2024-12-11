<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import GallerySectionRenderer from '../../../Components/Renderers/GallerySectionRenderer.vue';

  defineProps({
    sections: { required: true, type: Array },
    swiperPhotos: { required: true, type: Array },
  });

</script>

<template>
  <ClientLayout :swiperPhotos>
    <header>
      <h2>Galeria</h2>
      <p>Zapraszamy do obejrzenia zdjęć naszego Domku!</p>
    </header>
    <div v-if="sections.length > 0">
      <GallerySectionRenderer v-for="section in sections" :section />
    </div>
  </ClientLayout>
</template>

