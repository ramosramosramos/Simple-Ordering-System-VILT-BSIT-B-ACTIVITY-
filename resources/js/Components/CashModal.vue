<template>
    <teleport to="body">
      <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50" @click="close"></div>
        <div class="bg-white p-5 rounded shadow-lg z-10">
          <h2 class="text-lg font-bold">{{ title }}</h2>
          <slot></slot>
          <button @click="close" class="mt-4 bg-blue-500 text-white p-2 rounded">Close</button>
        </div>
      </div>
    </teleport>
  </template>

  <script setup>
  import { defineProps, emit } from 'vue';

  const props = defineProps({
    title: {
      type: String,
      default: 'Modal Title'
    },
    isOpen: {
      type: Boolean,
      required: true
    }
  });

  const emitClose = () => {
    emit('update:isOpen', false); // Emit an event to notify the parent to close
  };

  const close = () => {
    emitClose();
  };
  </script>

  <style scoped>
  /* Add any necessary styles here */
  </style>
