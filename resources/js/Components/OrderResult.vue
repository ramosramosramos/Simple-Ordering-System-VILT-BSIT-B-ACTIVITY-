<template>
    <div class="m-10 text-gray-400 ">
        <h1>Grand  Total : <span>{{ grand_total }}</span> </h1>
        <h1>Cash : <span>{{ cash }}</span></h1>
        <h1> Balance : <span>{{ balance }}</span></h1>
     </div>
</template>
<script setup>

defineProps({
    grand_total:Number,
    cash:Number,
    balance:Number,
})
</script>
