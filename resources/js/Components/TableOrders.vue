<template>
    <table class="w-[95%] m-auto">
        <thead class="border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-400 px-6 py-4 text-left">Product name</th>
                <th scope="col" class="text-sm font-medium text-gray-400 px-6 py-4 text-left">Quantity</th>
                <th scope="col" class="text-sm font-medium text-gray-400 px-6 py-4 text-left">Price</th>
                <th scope="col" class="text-sm font-medium text-gray-400 px-6 py-4 text-left">Total</th>
                <th scope="col" class="text-sm font-medium text-gray-400 px-6 py-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody >

            <tr  v-for="order in orders.data " :key="order.id" class="bg-white border-b ">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ order.name }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4">{{order.quantity  }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4">{{order.price}}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4">{{ order.total }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4"><Link
                    :href="route('orders.destroy',order.id)" method="delete" as="button" preserve-scroll class="text-red-600" >Remove</Link></td>
            </tr>

        </tbody>
    </table>

</template>
<script setup>
import { Link } from '@inertiajs/vue3';


defineProps({
    orders:Object,
})
</script>
