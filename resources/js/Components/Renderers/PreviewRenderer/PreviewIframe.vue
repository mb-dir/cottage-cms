<script setup>

  import { ref, onMounted } from 'vue';

  defineProps({
    src: {
      type: String,
      required: true,
    },
  });

  const isLoading = ref(true);

  const htmlIframe = ref(null);

  defineExpose({ htmlIframe });

  function handleLoad() {
    isLoading.value = false;
  }

  onMounted(() => {
    htmlIframe.value.addEventListener('load', handleLoad);
  });
</script>

<template>
  <div class="iframe-wrapper">
    <div v-if="isLoading" class="loading-indicator">Ładowanie...</div>
    <iframe ref="htmlIframe" :src class="iframe" loading="lazy"></iframe>

  </div>
</template>

<style scoped>
  .iframe-wrapper {
    position: relative;
  }

  .loading-indicator {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 32px;
  }
  
  .iframe {
    width: 100%;
    height: 700px;
    border: none;
    margin-top: 12px;
  }
</style>