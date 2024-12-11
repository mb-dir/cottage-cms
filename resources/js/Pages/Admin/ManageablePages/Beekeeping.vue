<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import SectionsGrid from '../Partial/SectionsGrid.vue';
  import PreviewRenderer from '../../../Components/Renderers/PreviewRenderer/PreviewRenderer.vue';
  import PickMainSwiperPhotos from '../../../Components/UI/PickMainSwiperPhotos.vue';

  defineProps({
    sections: { type: Array, required: true },
    photos: { required: true, type: Array },
    swiperPhotos: { required: true, type: Array },
  });
</script>

<template>
  <AdminLayout>
    <ContentSectionForm />
    <SectionsGrid :sections />
    <PickMainSwiperPhotos :photos :swiperPhotos />

    <PreviewRenderer :sections :src="route('client.beekeeping.index')" />
  </AdminLayout>
</template>
