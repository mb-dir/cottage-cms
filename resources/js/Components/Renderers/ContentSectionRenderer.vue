<script setup>

  const props = defineProps({
    section: { required: true, type: Object },
  });

</script>

<template>

  <section class="section">
    <h3>{{ section.title }}</h3>
    <div v-html="section.content" />
  </section>
</template>

<style scoped>

</style>