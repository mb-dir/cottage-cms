<script setup>
  import { ref, onMounted } from 'vue';
  import Button from '../UI/Button.vue';

  const props = defineProps({
    src: {
      type: String,
      required: true,
    },
  });

  const isLoading = ref(true);

  const htmlIframe = ref();

  function handleLoad() {
    isLoading.value = false;
  }

  function refreshIframe() {
    isLoading.value = true;
    htmlIframe.value.src = props.src;
  }

  onMounted(() => {
    htmlIframe.value.addEventListener('load', handleLoad);
  });
</script>

<template>
  <div class="preview-wrapper">
    <Button @click="refreshIframe">Przeładuj</Button>
    <div v-if="isLoading" class="loading-indicator">Ładowanie...</div>
    <iframe ref="htmlIframe" :src class="preview" loading="lazy"></iframe>
  </div>
</template>

<style scoped>
  .preview-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    padding-top: 40px;
  }

  .preview {
    width: 100%;
    height: 700px;
    border: none;
    margin-top: 12px;
  }

  .loading-indicator {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 32px;
  }
</style>
