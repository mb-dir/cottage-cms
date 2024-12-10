<script setup>
  import { ref, watch } from 'vue';
  import Button from '../../UI/Button.vue';
  import PreviewIframe from './PreviewIframe.vue';

  const props = defineProps({
    src: {
      type: String,
      required: true,
    },
    sections: { type: Array, required: true },
  });

  const key = ref(0);

  watch(() => props.sections, () => {
    key.value += 1;
  });

  const previewIframe = ref();

  function refreshIframe() {
    key.value += 1;
  }
  
</script>

<template>
  <div class="preview-wrapper">
    <Button @click="refreshIframe">Przeładuj</Button>
    <PreviewIframe :key ref="previewIframe" :src />
  </div>
</template>

<style scoped>
  .preview-wrapper {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    padding-top: 40px;
  }
</style>
