<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import ContentSectionRenderer from '../../../Components/Renderers/ContentSectionRenderer.vue';

  defineProps({ contentSections: { type: Array, required: true } });

</script>

<template>
  <ClientLayout>
    <h2>Okolica i atrakcje</h2>
    <p>Poniżej zaproponujemy Państwu kilka miejsc które, naszym zdaniem, warto odwiedzić będąc gościem naszego domku.</p>

    <div v-if="contentSections.length > 0">
      <ContentSectionRenderer v-for="section in contentSections" :section />
    </div>
  </ClientLayout>
</template>

<style scoped>

</style>