<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import SectionsGrid from '../Partial/SectionsGrid.vue';

  defineProps({
    sections: { type: Array, required: true },
  });
</script>

<template>
  <AdminLayout>
    <ContentSectionForm />
    <SectionsGrid :sections />
  </AdminLayout>
</template>
