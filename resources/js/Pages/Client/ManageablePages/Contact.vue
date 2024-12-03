<script setup>
  import ClientLayout from '../../../Layouts/ClientLayout.vue';
  import ContentSectionRenderer from '../../../Components/Renderers/ContentSectionRenderer.vue';
  import Calendar from '../../../Components/UI/Calendar/Calendar.vue';

  defineProps({ sections: { type: Array, required: true }, calendar: { type: Array, required: true } });

</script>

<template>
  <ClientLayout>
    <h2>Kontakt</h2>
    <div v-if="sections.length > 0">
      <ContentSectionRenderer v-for="section in sections" :section />
    </div>

    <Calendar :calendar />
  </ClientLayout>
</template>
