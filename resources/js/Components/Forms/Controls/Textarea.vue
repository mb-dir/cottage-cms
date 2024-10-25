<script setup>
  defineOptions({
    inheritAttrs: false,
  });

  defineProps({
    // label same as placeholder
    label: {
      type: String,
      required: true,
    },
  });

  const model = defineModel({ type: String });

  const uniqueId = `textarea-${Math.random().toString(36).substr(2, 9)}`;
</script>

<template>
  <div class="control">
    <label :for="uniqueId" class="control__label">{{ label }}</label>
    <textarea :id="uniqueId" v-model="model" :placeholder="label" class="control__textarea" v-bind="$attrs" />
  </div>
</template>

<style scoped>
  .control {
    display: flex;
    flex-direction: column;
    margin-bottom: 1rem;
  }

  .control__label {
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
    font-weight: 600;
  }

  .control__textarea {
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s ease;
    resize: vertical;
    min-height: 200px;
  }

  .control__textarea:focus {
    border-color: #3490dc;
  }
</style>