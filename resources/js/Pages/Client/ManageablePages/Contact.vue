<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import ContentSectionRenderer from '../../../Components/Renderers/ContentSectionRenderer.vue';

  defineProps({ contentSections: { type: Array, required: true } });

</script>

<template>
  <ClientLayout>
    <h2>Kontakt</h2>
    <div v-if="contentSections.length > 0">
      <ContentSectionRenderer v-for="section in contentSections" :section />
    </div>
  </ClientLayout>
</template>
