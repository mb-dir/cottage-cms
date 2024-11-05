<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import ContentSectionGrid from '../Partial/ContentSectionGrid.vue';

  defineProps({
    contentSections: { type: Array, required: true },
  });
</script>

<template>
  <AdminLayout>
    <ContentSectionForm />
    <ContentSectionGrid :contentSections />
  </AdminLayout>
</template>

<style scoped>

</style>