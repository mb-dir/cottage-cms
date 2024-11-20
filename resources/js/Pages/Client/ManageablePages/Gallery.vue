<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import GallerySectionRenderer from '../../../Components/Renderers/GallerySectionRenderer.vue';

  defineProps({
    sections: { required: true, type: Array },
  });

</script>

<template>
  <ClientLayout>
    <div v-if="sections.length > 0">
      <GallerySectionRenderer v-for="section in sections" :section />
    </div>
  </ClientLayout>
</template>

