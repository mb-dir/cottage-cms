<script setup>
  import ContentSectionCard from '../../../Components/Sections/Content/ContentSectionCard.vue';

  defineProps({
    contentSections: { type: Array, required: true },
  });
</script>

<template>
  <section class="content-sections">
    <h2>Sekcje</h2>
    <div v-if="contentSections?.length > 0" class="content-sections__list">
      <ContentSectionCard v-for="section in contentSections" :section />
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