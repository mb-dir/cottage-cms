<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import ContentSectionRenderer from '../../../Components/Renderers/ContentSectionRenderer.vue';

  defineProps({ sections: { type: Array, required: true } });
</script>

<template>
  <ClientLayout>
    <h2>Pszczoły to nasza pasja</h2>
    <div v-if="sections.length > 0">
      <ContentSectionRenderer v-for="section in sections" :section />
    </div>
  </ClientLayout>
</template>

<style scoped>

</style>