<template>
    <nav class="h-[50px] bg-gray-900"></nav>
    <section class="min-h-[100vh] bg-gray-900 flex flex-col flex-wrap">
        <div class=" flex gap-6  h-[350px] w-[90%] m-auto">
            <form @submit.prevent="handleOrders" class="w-[100%] flex flex-col justify-center items-center">
                <InputField v-model="form.name" label="Product name" placeholder="Example name. .."
                    :error="errors.name" />
                <InputField v-model="form.quantity" type="number" label="Quantity" placeholder="Number of items"
                    :error="errors.quantity" />
                <InputField v-model="form.price" type="number" label="Price" placeholder="Amount of product" :error="errors.name" />
                <button type="submit" class="bg-gray-800 text-gray-300  w-[90%]
                 m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all
                  ease-out">Add orders</button>
            </form>

            <div class="w-[100%] ">
                <OrderResult :grand_total="grand_total" />
            </div>
        </div>

        <div class=" flex justify-center items-center w-[90%] m-auto">
            <TableOrders :orders="orders" />
        </div>
        <div class="h-[50px]">

        </div>

    </section>
</template>
<script setup>
import InputField from '@/Components/InputField.vue';
import OrderResult from '@/Components/OrderResult.vue';
import TableOrders from '@/Components/TableOrders.vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object,
    orders:Object,
    grand_total:Number,
})
const form = useForm({
    name: "",
    quantity: null,
    price: null,
});

const handleOrders = () => {

}
</script>
