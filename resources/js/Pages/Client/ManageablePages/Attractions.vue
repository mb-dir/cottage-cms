<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import ContentSectionRenderer from '../../../Components/Renderers/ContentSectionRenderer.vue';

  defineProps({
    sections: { type: Array, required: true },
    swiperPhotos: { required: true, type: Array },
  });

</script>

<template>
  <ClientLayout :swiperPhotos>
    <h2>Okolica i atrakcje</h2>
    <p>Poniżej zaproponujemy Państwu kilka miejsc które, naszym zdaniem, warto odwiedzić będąc gościem naszego domku.</p>

    <div v-if="sections.length > 0">
      <ContentSectionRenderer v-for="section in sections" :section />
    </div>
  </ClientLayout>
</template>

<style scoped>

</style>