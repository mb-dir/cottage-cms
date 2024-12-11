<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import ContentSectionRenderer from '../../../Components/Renderers/ContentSectionRenderer.vue';
  import Calendar from '../../../Components/UI/Calendar/Calendar.vue';

  defineProps({ sections: { type: Array, required: true }, calendar: { type: Array, required: true }, swiperPhotos: { required: true, type: Array } });

</script>

<template>
  <ClientLayout :swiperPhotos>
    <h2>Kontakt</h2>
    <div v-if="sections.length > 0">
      <ContentSectionRenderer v-for="section in sections" :section />
    </div>

    <section class="section">
      <h3>Sprawdź dostępne terminy</h3>
      <Calendar :calendar />
    </section>
  </ClientLayout>
</template>
