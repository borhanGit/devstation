<template>
     <Head title="New Invoice" />
     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Invoice</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="product_id" value="Product" />

                        <select
                        v-model="form.product_id"
                        id="product_id"
                        name="product_id"
                         @change="onSelectChange(form.product_id)"
                        class="
                            mt-1
                            block
                            w-full
                            pl-3
                            pr-10
                            py-2
                            text-base
                            border-gray-300
                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                            sm:text-sm
                            rounded-md
                        "
                        >
                            <option v-for="product in products" :key="product.id" :value="product.id">
                                {{ product.title }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.product_id" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="price" value="Price" />

                        <TextInput
                            id="price"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.price"
                            required
                            autocomplete="price"
                        />

                        <InputError class="mt-2" :message="form.errors.price" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="invoice_date" value="Invoice Date" />

                        <TextInput
                            id="invoice_date"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="form.invoice_date"
                            required
                            autocomplete="invoice_date"
                        />

                        <InputError class="mt-2" :message="form.errors.invoice_date" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="due_date" value="Due Date" />

                        <TextInput
                            id="due_date"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="form.due_date"
                            required
                            autocomplete="due_date"
                        />

                        <InputError class="mt-2" :message="form.errors.due_date" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="date" value="Product Qty" />

                        <TextInput
                            id="product_qty"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.product_qty"
                            required                            
                            autocomplete="product_qty"
                            @change="onChangeQty($event)"
                        />

                        <InputError class="mt-2" :message="form.errors.product_qty" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="discount" value="Discount" />

                        <TextInput
                            id="discount"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.discount"                                                 
                            autocomplete="discount"
                            @change="onChangeDiscount($event)"
                        />

                        <InputError class="mt-2" :message="form.errors.discount" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="tax" value="Tax" />

                        <TextInput
                            id="tax"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.tax"                                          
                            autocomplete="tax"
                            @change="onChangeTax($event)"
                        />

                        <InputError class="mt-2" :message="form.errors.tax" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"  
                            required                                        
                            autocomplete="email"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="total" value="Total" />

                        <TextInput
                            id="total"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.total"  
                            required   
                            readonly                                     
                            autocomplete="total"
                        />

                        <InputError class="mt-2" :message="form.errors.total" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                      

                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Store
                        </PrimaryButton>
                    </div>
                </form>                
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";

defineProps({
  products: Array
});

const form = useForm({
    product_id:'',
    price:'',
    invoice_date:'',
    due_date:'',
    product_qty:'',
    discount:'',
    tax:'',
    email:'',
    total:'',
});
const submit = () => {
  form.post(route("invoices.store"));
};
function onSelectChange(product_id){
    const id = product_id;

    axios.get(`/product/${id}`)
                .then(res => {
                    form.price = res.data.price
                    form.total = form.price                     
                }).catch(err => {
            })

};
function onChangeQty(e){
   form.total = form.price * e.target.value

}
function onChangeDiscount(e){
   form.total = form.total - e.target.value

}
function onChangeTax(e){
   form.total = form.total - e.target.value

}
</script>
