<script setup>
  import { ref } from 'vue';

  const dialog = ref(null);
  const visible = ref(false);

  const showModal = () => {
    dialog.value?.showModal();
    visible.value = true;
  };

  defineExpose({
    show: showModal,
    close: (returnVal) => dialog.value?.close(returnVal),
    visible,
  });
</script>

<template>
  <dialog
    ref="dialog"
    class="custom-modal"
    @close="visible = false"
  >
    <button class="close-button" @click="dialog?.close()">✖</button>
    <div class="modal-content">
      <slot />
    </div>
  </dialog>
</template>

<style scoped>
  .custom-modal {
    background-color: #2a2a2a; /* Dark modal background */
    color: #f5f5f5; /* Light text color */
    border-radius: 10px;
    border: none;
    padding: 20px;
    min-width: 600px;
    max-width: 80%;
    min-height: 500px;
    max-height: 500px;
    overflow-y: auto;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    position: relative;
  }

  .custom-modal::backdrop {
    background-color: rgba(0, 0, 0, 0.6); /* Darken the background behind modal */
  }

  .close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #f5f5f5;
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .close-button:hover {
    transform: scale(1.1);
  }

  .close-button:focus {
    outline: none;
  }

  .modal-content {
    display: flex;
    justify-content: center;
    padding: 20px;
  }
</style>
