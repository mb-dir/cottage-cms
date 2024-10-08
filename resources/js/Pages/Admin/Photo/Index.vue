<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  const props = defineProps({
    photos: { required: true },
  });

  const form = useForm({
    files: [],
  });

  console.log(props);

  const fileInputRef = ref(null);

  function onSubmit() {
    form.post(route('photo.create'), {
      onSuccess: () => {
        form.files = [];
        if (fileInputRef.value) {
          fileInputRef.value.value = null;
        }
      },
    });
  }

  function onPhotoChange(e) {
    form.files = e.target.files;
  }
</script>

<template>
  <AdminLayout>
    <form @submit.prevent="onSubmit">
      <input ref="fileInputRef" multiple type="file" @change="onPhotoChange">
      <button type="submit">Dodaj</button>
    </form>

    <div v-if="photos?.length" class="photos">
      <img v-for="photo in photos" :src="`${photo.src}`" alt="">
    </div>
  </AdminLayout>
</template>

<style scoped>
  .photos {
    display: grid;
    grid-template-columns: repeat(4, minmax(150px, 1fr));
    grid-template-rows: 200px;
    gap: 16px;
    padding: 16px;
  }

  .photos img {
    width: 100%;
    object-fit: cover;
    height: 200px;
  }
</style>
