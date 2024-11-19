<script setup>
  import ContentSectionCard from '../../../Components/Sections/Content/ContentSectionCard.vue';
  import { ref } from 'vue';
  import { router } from '@inertiajs/vue3';

  defineProps({
    contentSections: { type: Array, required: true },
  });

  const draggedSectionId = ref(null);
  const dropTargetSectionId = ref(null);

  const handleDragStart = (sectionId) => {
    draggedSectionId.value = sectionId;
  };

  const handleDrop = (sectionId) => {
    dropTargetSectionId.value = sectionId;
    router.put(route('admin.ordered-section-update', { draggedSectionId: draggedSectionId.value, dropTargetSectionId: dropTargetSectionId.value }));
  };
</script>

<template>
  <section class="content-sections">
    <h2>Sekcje</h2>
    <div v-if="contentSections?.length > 0" class="content-sections__list">
      <ContentSectionCard v-for="section in contentSections" :section draggable="true"
        @dragstart="handleDragStart(section.id)"
        @drop="handleDrop(section.id)"
        @dragover.prevent />
    </div>
    <div v-else class="content-sections__no-sections">Brak dodanych sekcji</div>
  </section>
</template>

<style scoped>
  .content-sections {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .content-sections__list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .content-sections__no-sections {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
  }
</style>