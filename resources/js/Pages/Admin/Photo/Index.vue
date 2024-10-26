<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm } from '@inertiajs/vue3';
  import { ref, reactive } from 'vue';
  import PhotoGridWithDelete from '../../../Components/UI/PhotoGridWithDelete.vue';
  import Button from '../../../Components/UI/Button.vue';
  import Input from '../../../Components/Forms/Controls/Input.vue';

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
        fileInputRef.value.inputRef.value = null;
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

    fileInputRef.value.inputRef.files = dataTransfer.files;
    form.files = dataTransfer.files;
  }
</script>

<template>
  <AdminLayout>
    <div class="photo-index">
      <form @submit.prevent="onSubmit">
        <Input ref="fileInputRef" label="Dodaj zdjęcia" multiple type="file" @change="onPhotoChange" />
        <Button>Dodaj</Button>
      </form>

      <div v-if="filePreviews.length">
        <h3>Zdjęcia które zostaną dodane</h3>
        <div class="photo-index__preview-container">
          <div v-for="(preview, index) in filePreviews" :key="index" class="photo-index__preview">
            <Button class="photo-index__preview-delete" type="delete" @click="deletePreviewPhoto(index)">X</Button>
            <img :src="preview" alt="Preview" class="photo-index__preview-img">
          </div>
        </div>
      </div>

      <h3>Dodane zdjęcia</h3>
      <PhotoGridWithDelete :photos />
    </div>

  </AdminLayout>
</template>

<style scoped>
  .photo-index {
    display: flex;
    flex-direction: column;
  }

  .photo-index__preview-container {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 16px;
    margin-bottom: 16px;
  }

  .photo-index__preview-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio, cover the container */
    border-radius: 8px; /* Apply rounded corners to images */
  }

  .photo-index__preview {
    position: relative;
  }

  .photo-index__preview-delete {
    position: absolute;
    top: 8px;
    right: 8px;
  }
</style>
