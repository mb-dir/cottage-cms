<script setup>
  import ContentSectionCard from '../../../Components/Sections/Content/ContentSectionCard.vue';
  import { ref } from 'vue';
  import { router } from '@inertiajs/vue3';
  import GallerySectionCard from '../../../Components/Sections/Gallery/GallerySectionCard.vue';

  defineProps({
    sections: { type: Array, required: true },
    photos: { type: Array },
  });

  const draggedSectionId = ref(null);
  const dropTargetSectionId = ref(null);
  const draggedSectionType = ref(null);
  const dropTargetSectionType = ref(null);

  const handleDragStart = (section) => {
    draggedSectionId.value = section.id;
    draggedSectionType.value = section.type;
  };

  const handleDrop = (section) => {
    dropTargetSectionId.value = section.id;
    dropTargetSectionType.value = section.type;
    router.put(route('admin.ordered-section-update', { draggedSectionId: draggedSectionId.value, dropTargetSectionId: dropTargetSectionId.value, draggedSectionType: draggedSectionType.value, dropTargetSectionType: dropTargetSectionType.value }));
  };
</script>

<template>
  <section class="content-sections">
    <h2>Sekcje</h2>
    <div v-if="sections?.length > 0" class="content-sections__list">
      <div v-for="section in sections" draggable="true"
        @dragstart="handleDragStart(section)"
        @drop="handleDrop(section)"
        @dragover.prevent>
        <ContentSectionCard v-if="section.type === 'ContentSection'" :section />
        <GallerySectionCard v-else :photos :section />
      </div>

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