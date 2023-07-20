<template>
     <Head title="Invoice Index" />
     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Invoice</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/invoices/create" class="px-4 py-3 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Create Invoice</Link>

                </div>
                        <div class="overflow-x-auto relative">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                            class="
                                text-xs text-gray-700
                                uppercase
                                bg-gray-50
                                dark:bg-gray-700 dark:text-gray-400
                            "
                            >
                            <tr>
                                <th scope="col" class="py-3 px-6">SL</th>
                                <th scope="col" class="py-3 px-6">Product</th>
                                <th scope="col" class="py-3 px-6">Price</th>
                                <th scope="col" class="py-3 px-6">Invoice Date</th>
                                <th scope="col" class="py-3 px-6">Due Date</th>
                                <th scope="col" class="py-3 px-6">Product Qty</th>
                                <th scope="col" class="py-3 px-6">Discount</th>
                                <th scope="col" class="py-3 px-6">Tax</th>
                                <th scope="col" class="py-3 px-6">Email</th>
                                <th scope="col" class="py-3 px-6">Total</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="invoice in invoices.data"
                                :key="invoice.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                            >
                                <th
                                scope="row"
                                class="
                                    py-4
                                    px-6
                                    font-medium
                                    text-gray-900
                                    whitespace-nowrap
                                    dark:text-white
                                "
                                >
                                {{ invoice.id }}
                                </th>
                                <td class="py-4 px-6">{{ invoice.product.title }}</td>
                                <td class="py-4 px-6">{{invoice.price}} </td>
                                <td class="py-4 px-6">{{invoice.invoice_date}} </td>
                                <td class="py-4 px-6">{{invoice.due_date}} </td>
                                <td class="py-4 px-6">{{invoice.product_qty}} </td>
                                <td class="py-4 px-6">{{invoice.discount}} </td>
                                <td class="py-4 px-6">{{invoice.tax}} </td>
                                <td class="py-4 px-6">{{invoice.email}} </td>
                                <td class="py-4 px-6">{{invoice.total}} </td>
                                
                            </tr>
                            </tbody>
                        </table>
                </div>
               
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
defineProps({
  invoices: Object,
});
</script>
