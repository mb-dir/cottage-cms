<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm, router } from '@inertiajs/vue3';
  import { ref, reactive } from 'vue';

  const props = defineProps({
    photos: { required: true },
  });

  const form = useForm({
    files: [],
  });

  const filePreviews = reactive([]);
  const fileInputRef = ref(null);

  function onSubmit() {
    form.post(route('admin.photo.store'), {
      onSuccess: () => {
        form.files = [];
        filePreviews.length = 0;
        if (fileInputRef.value) {
          fileInputRef.value.value = null;
        }
      },
    });
  }

  function onPhotoChange(e) {
    const selectedFiles = e.target.files;
    form.files = selectedFiles;
    filePreviews.length = 0;

    Array.from(selectedFiles).forEach((file) => {
      const reader = new FileReader();
      reader.onload = (event) => {
        filePreviews.push(event.target.result);
      };
      reader.readAsDataURL(file);
    });
  }

  function deletePreviewPhoto(index) {
    filePreviews.splice(index, 1);

    const filesArray = Array.from(form.files);
    filesArray.splice(index, 1);

    const dataTransfer = new DataTransfer();
    filesArray.forEach((file) => dataTransfer.items.add(file));

    fileInputRef.value.files = dataTransfer.files;
    form.files = dataTransfer.files;
  }

  function onPhotoDelete(photo) {
    if (confirm('Czy jesteś pewnien?')) {
      router.delete(route('admin.photo.destroy', { photo }));
    }
  }
</script>

<template>
  <AdminLayout>
    <form @submit.prevent="onSubmit">
      <input ref="fileInputRef" multiple type="file" @change="onPhotoChange">
      <button type="submit">Dodaj</button>
    </form>

    <!-- Preview the newly added photos -->
    <div v-if="filePreviews.length" class="photos-preview">
      <div v-for="(preview, index) in filePreviews" :key="index" class="preview">
        <button class="preview-delete" @click="deletePreviewPhoto(index)">X</button>
        <img :src="preview" alt="Preview">
      </div>
    </div>

    <!-- Existing photos already stored -->
    <div v-if="photos?.length" class="photos">
      <div v-for="photo in photos" class="photos__photo">
        <button class="photos__delete" @click="onPhotoDelete(photo)">X</button>
        <img :alt="photo.src" :src="photo.src">
      </div>
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

  .photos__photo {
    position: relative;
  }

  .photos__delete {
    font-weight: bold;
    color: red;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  .photos-preview {
    display: grid;
    grid-template-columns: repeat(4, minmax(150px, 1fr));
    gap: 16px;
    margin-bottom: 16px;
  }

  .preview img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border: 2px solid #ddd;
    border-radius: 4px;
  }

  .preview {
    position: relative;
  }

  .preview-delete {
    color: red;
    position: absolute;
    right: 5px;
    top: 5px;
  }
</style>
