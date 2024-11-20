<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import SectionsGrid from '../Partial/SectionsGrid.vue';
  import PreviewRenderer from '../../../Components/Renderers/PreviewRenderer.vue';

  defineProps({
    sections: { type: Array, required: true },
  });
</script>

<template>
  <AdminLayout>
    <ContentSectionForm />
    <SectionsGrid :sections />

    <PreviewRenderer :src="route('client.about.index')" />
  </AdminLayout>
</template>
