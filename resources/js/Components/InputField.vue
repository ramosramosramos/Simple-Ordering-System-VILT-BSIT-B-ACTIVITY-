<template>
    <div class="mb-6 flex flex-col w-[90%] m-auto">
        <label class="text-gray-400">{{ label }}</label>
        <input :type="type"  min="0" :placeholder="placeholder" v-model="model" class="rounded-sm">
        <p class="text-red-600">{{ error }}</p>
    </div>
</template>
<script setup>

defineProps({
    type: {
        type: String,
        default: "text",

    },
    label: {
        type: String,
        default: "label",

    },
    placeholder: {
        type: String,
        default: "placeholder",

    },
    error: {
        type: String,
        default: "",

    },


})
const model = defineModel();

</script>
