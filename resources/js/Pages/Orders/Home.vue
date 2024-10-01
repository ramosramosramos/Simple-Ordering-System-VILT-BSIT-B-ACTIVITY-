<template>
    <Head title="Orders"/>
    <nav class="h-[50px] bg-gray-900"></nav>

    <section class="min-h-[100vh] bg-gray-900 flex flex-col flex-wrap">
        <div class="flex gap-6 w-[90%] m-auto">
            <form @submit.prevent="handleOrders" class="w-[100%] flex flex-col justify-center items-center">
                <InputField v-model="form.name" label="Product name" placeholder="Example name..."
                    :error="errors.name" />
                <InputField @keyup="countTotal" v-model="form.quantity" type="number" label="Quantity"
                    placeholder="Number of items" :error="errors.quantity" />
                <InputField @keyup="countTotal" v-model="form.price" type="number" label="Price"
                    placeholder="Amount of product" :error="errors.price" />

                <h1 class="text-gray-300 mb-3 text-left w-[90%]">Total: {{ total }}</h1>
                <button type="submit" class="bg-gray-800 text-gray-300 w-[90%] m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all ease-out">Add orders</button>
            </form>

            <div class="w-[100%] ">
                <OrderResult :grand_total="grand_total" :cash="cash" :balance="balance" />
            </div>
        </div>

        <div class="flex justify-center items-center w-[90%] m-auto">
            <TableOrders :orders="orders" />
        </div>
        <div class="h-[50px]"></div>
    </section>
</template>

<script setup>
import InputField from '@/Components/InputField.vue';
import OrderResult from '@/Components/OrderResult.vue';
import TableOrders from '@/Components/TableOrders.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    errors: Object,
    orders: Object,
    grand_total: Number,
    cash: Number,
    balance: Number,
});

const form = useForm({
    name: "",
    quantity: null,
    price: null,
});

let total = ref(0);


const countTotal = () => {
    total.value=0;
    total.value = (form.quantity || 0) * (form.price || 0);
};


const handleOrders = () => {
    form.post(route('orders.store'), {
        onSuccess: () => {
            form.reset();
            total.value = 0;
        }
    });
};
</script>
