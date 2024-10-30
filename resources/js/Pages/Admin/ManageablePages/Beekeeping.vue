<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import ContentSectionForm from '../../../Components/Forms/ContentSectionForm.vue';
  import ContentSectionCard from '../../../Components/Sections/Content/ContentSectionCard.vue';

  defineProps({
    contentSections: { type: Array, required: true },
  });
</script>

<template>
  <AdminLayout>
    <ContentSectionForm />
    <section class="gallery-sections">
      <h2>Sekcje</h2>
      <div v-if="contentSections?.length > 0" class="gallery-sections__list">
        <ContentSectionCard v-for="section in contentSections" :section />
      </div>
      <div v-else class="gallery-sections__no-sections">Brak dodanych sekcji</div>
    </section>
  </AdminLayout>
</template>

<style scoped>
  .gallery-sections {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .gallery-sections__list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .gallery-sections__no-sections {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
  }
</style>