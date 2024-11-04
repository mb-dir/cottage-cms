<script setup>
  import { ref } from 'vue';
  import { ClassicEditor, Bold, Essentials, Italic, Mention, Paragraph, Undo, FontColor, List } from 'ckeditor5';

  defineProps({
    // label same as placeholder
    label: {
      type: String,
      required: true,
    },
  });

  const editor = ClassicEditor;

  const editorConfig = {
    plugins: [Bold, Essentials, Italic, Mention, Paragraph, Undo, FontColor, List],
    toolbar: ['undo', 'redo', '|', 'bold', 'italic', 'fontColor', 'bulletedList', 'numberedList'],
  };

  const model = defineModel();

  // Generate a unique ID for the editor instance
  const uniqueId = `editor-${Math.random().toString(36).substr(2, 9)}`;

  // Use a ref to reference the CKEditor instance
  const editorRef = ref(null);

  // Method to focus the CKEditor
  const focusEditor = () => {
    if (editorRef.value && editorRef.value.instance) {
      const editorInstance = editorRef.value.instance;

      // Focus the editor
      editorInstance.focus();

      // Get the model and create a range at the end of the content
      const model = editorInstance.model;
      const endPosition = model.createPositionAt(model.document.getRoot(), 'end');

      // Set the selection at the end position
      model.change(writer => {
        writer.setSelection(endPosition);
      });
    }
  };
</script>

<template>
  <div class="control">
    <label :for="uniqueId" class="control__label" @click="focusEditor">{{ label }}</label>
    <ckeditor
      :id="uniqueId"
      ref="editorRef"
      v-model="model"
      :config="editorConfig"
      :editor="editor"
      :placeholder="label"
    />
  </div>
</template>

<style>
  .ck-editor__main {
    color: black;
  }

  .ck-content {
    min-height: 150px;
  }

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
</style>
