<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import GallerySectionRenderer from '../../../Components/Renderers/GallerySectionRenderer.vue';

  defineProps({
    gallerySections: { required: true, type: Array },
  });

</script>

<template>
  <ClientLayout>
    <div v-if="gallerySections.length > 0">
      <GallerySectionRenderer v-for="section in gallerySections" :section />
    </div>
  </ClientLayout>
</template>

