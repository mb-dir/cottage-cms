<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import SectionsGrid from '../Partial/SectionsGrid.vue';
  import PreviewRenderer from '../../../Components/Renderers/PreviewRenderer/PreviewRenderer.vue';
  import CalendarManager from '../../../Components/UI/CalendarManager/CalendarManager.vue';
  import PickMainSwiperPhotos from '../../../Components/UI/PickMainSwiperPhotos.vue';

  defineProps({
    sections: { type: Array, required: true },
    calendar: { type: Array, required: true },
    reservedDays: { type: Array, required: true },
    photos: { required: true, type: Array },
    swiperPhotos: { required: true, type: Array },
  });
</script>

<template>
  <AdminLayout>
    <CalendarManager :calendar :reservedDays />
    <ContentSectionForm />
    <SectionsGrid :sections />
    <PickMainSwiperPhotos :photos :swiperPhotos />

    <PreviewRenderer :sections :src="route('client.contact.index')" />
  </AdminLayout>
</template>
