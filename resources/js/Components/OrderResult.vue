<template>
    <div class="m-10 text-gray-400 grid gap-4 ">
        <h1>Grand Total : <span>{{ grand_total }}</span> </h1>
        <h1>Cash : <span>{{ cash }}</span></h1>
        <h1> Balance : <span>{{ balance }}</span></h1>


        <div class="flex flex-col gap-2">
            <button @click="openModal"
                class="bg-gray-800 text-gray-300 w-[90%] m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all ease-out">
                Add Cash
            </button>

            <CashModal :isOpen="isModalOpen" @update:isOpen="isModalOpen = $event" title="Payment Form">
                <div>
                    <form @submit.prevent="handlePayment" class="w-[400px] flex flex-col">

                        <InputField v-model="form.cash" :error="form.errors.cash" type="number" label="Add Cash"
                            placeholder="0.00" />
                        <button type="submit"
                            class="bg-gray-800 text-gray-300 w-[90%] m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all ease-out">Proceed</button>
                    </form>
                </div>
            </CashModal>
            <button @click="handleTruncate" class="bg-gray-800 text-gray-300  w-[90%]
            m-auto h-[40px] rounded-sm hover:bg-gray-700 transition-all
             ease-out">Clear All</button>

        </div>
    </div>
</template>
<script setup>

import CashModal from '@/Components/CashModal.vue';
import InputField from '@/Components/InputField.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
const isModalOpen = ref(false);
defineProps({
    grand_total: Number,
    cash: Number,
    balance: Number,
})

const openModal = () => {
    isModalOpen.value = true;
};


const form = useForm({
    cash: null,
});

const orderTruncate = useForm({});
const paymentTruncate = useForm({});

const handlePayment = () => {
    form.post(route('payments.store'), {
        onSuccess: () => {
            form.reset();
            isModalOpen.value = false;
        }
    });
}


const handleTruncate = () => {
    orderTruncate.post(route('orders.truncate'));
    paymentTruncate.post(route('payments.truncate'));
}
</script>
