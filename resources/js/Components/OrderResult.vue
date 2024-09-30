<template>
    <div class="m-10 text-gray-400 grid gap-4 ">
        <h1>Grand  Total : <span>{{ grand_total }}</span> </h1>
        <h1>Cash : <span>{{ cash }}</span></h1>
        <h1> Balance : <span>{{ balance }}</span></h1>


        <div class="flex flex-col gap-2">
            <button  class="bg-gray-800 text-gray-300  w-[90%]
            m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all
             ease-out">Add Cash</button>
            <Link method="post" :href="route('orders.truncate')" as="button" class="bg-gray-800 text-gray-300  w-[90%]
            m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all
             ease-out">Clear All</Link>
        </div>
     </div>
</template>
<script setup>

defineProps({
    grand_total:Number,
    cash:Number,
    balance:Number,
})
</script>
