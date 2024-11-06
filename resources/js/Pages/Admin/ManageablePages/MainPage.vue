<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import ContentSectionGrid from '../Partial/ContentSectionGrid.vue';
  import PreviewRenderer from '../../../Components/Renderers/PreviewRenderer.vue';

  defineProps({
    contentSections: { type: Array, required: true },
  });
</script>

<template>
  <AdminLayout>
    <ContentSectionForm />
    <ContentSectionGrid :contentSections />

    <PreviewRenderer :src="route('client.about.index')" />
  </AdminLayout>
</template>
