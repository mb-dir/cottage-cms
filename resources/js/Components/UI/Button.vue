<script setup>
  import { computed } from 'vue';

  const props = defineProps({
    type: {
      default: 'primary',
      validator: (prop) => ['primary', 'delete'].includes(prop),
    },
  });

  const classes = computed(() => {
    return {
      'button--primary': props.type === 'primary',
      'button--delete': props.type === 'delete',
    };
  });
</script>

<template>
  <button :class="classes" class="button">
    <slot />
  </button>
</template>

<style scoped>
  .button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  /* Primary Button Style */
  .button--primary {
    background-color: #3490dc; /* Blue */
    color: white;
  }

  .button--primary:hover {
    background-color: #2779bd;
  }

  /* Delete Button Style */
  .button--delete {
    background-color: #e3342f; /* Red */
    color: white;
  }

  .button--delete:hover {
    background-color: #cc1f1a;
  }
</style>