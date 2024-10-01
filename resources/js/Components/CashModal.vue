<template>
    <teleport to="body">
      <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50" @click="close"></div>
        <div class=" flex flex-col gap-3 bg-white p-5 rounded shadow-lg z-10">
          <h2 class="text-lg font-bold">{{ title }}</h2>
          <slot></slot>
          <button @click="close" class=" w-[90%] m-auto bg-blue-500 text-white p-2 rounded">Close</button>
        </div>
      </div>
    </teleport>
  </template>

  <script setup>
  import { defineProps, defineEmits } from 'vue';

  // Define props
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

  // Define emits
  const emit = defineEmits();

  // Method to close the modal
  const close = () => {
    emit('update:isOpen', false);
  };
  </script>

  <style scoped>
  /* Optional: Add custom styles here */
  </style>
