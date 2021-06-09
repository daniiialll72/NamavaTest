<template>
    <div>
        <div class="container">
            <div class="flex items-center justify-center h-screen">
                <div class="bg-white text-black-50 font-bold rounded-lg border shadow-lg p-10 w-auto h-auto">
                    <div class="flex flex-row p-2">
                        <div class="w-1/4 bg-white text-black-50 font-bold rounded-lg border shadow-md py-1 w-auto">
                            <span class="p-1">Invoice</span>
                        </div>
                        <div class="px-4">
                            <button class="bg-pink-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                <router-link to="/add">Add</router-link>
                            </button>
                        </div>
                        <div class="w-2/4 ... "></div>
                    </div>
                    <div class="flex space-x-52 p-2">
                        <div class="w-1/2 bg-white text-black-50 font-bold rounded-lg border shadow-md w-auto p-1">
                            <span class="text-lg">John smith</span><br>
                            <span>Company Street</span><br>
                            <span>City</span><br>
                            <span>Country</span>
                        </div>
                        <div class="w-1/2 bg-white text-black-50 font-bold rounded-lg border shadow-md w-auto p-1">
                            <span class="text-lg">Client name</span><br>
                            <span>Client Address</span><br>
                            <span>City</span><br>
                            <span>Country</span>
                        </div>
                    </div>
                    <hr>
                    <div class="flex p-2">
                        <div class="w-auto">
                            <span>Number :  123223</span><br>
                            <span>Date  : 2012</span><br>
                            <span>Terms  : 6 days</span><br>
                            <span>Due  : 14 Aug 2018</span>
                        </div>
                    </div>
                    <hr>
                    <div class="flex">
                        <div class="w-full">
                            <table class="w-full table-auto">
                                <thead class="justify-between">
                                <tr class="bg-gray-800">
                                    <th class="px-2 py-2 mx-5">
                                        <span class="text-gray-300">Description</span>
                                    </th>
                                    <th class="px-2 py-2">
                                        <span class="text-gray-300">Price</span>
                                    </th>
                                    <th class="px-2 py-2">
                                        <span class="text-gray-300">Qty</span>
                                    </th>

                                    <th class="">
                                        <span class="text-gray-300">Amount</span>
                                    </th>
                                    <th class="">
                                        <span class="text-gray-300"></span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-200">

                                <tr v-for="invoice in invoices" class="bg-white border-4 border-gray-200">
                                    <td class="px-2 py-2 mx-5">
                                        <span class="text-center font-semibold">{{invoice.product_name}}</span>
                                    </td>
                                    <td>
                                        <span class="text-center ml-2 font-semibold">{{invoice.price}}</span>
                                    </td>
                                    <td class="px-2 py-2">
                                        {{invoice.quantity}}
                                    </td>
                                    <td class="">
                                        {{'$' + Number(invoice.quantity * invoice.price).toLocaleString()}}
                                    </td>
                                    <td class="">
                                        <button @click="deleteInvoice(invoice.id)">
                                            <img style="width: 24px;height: 24px" src="https://img.icons8.com/fluent/48/000000/delete-forever.png"/>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="flex flex-row-reverse py-1 px-2">
                                <div class="flex flex-column">
                            <span>
                                Subtotal : {{ '$' + Number(subtotal).toLocaleString() }}
                            </span>
                                    <span>
                                Tax(%5) : {{ '$' + Number(0.05 * subtotal).toLocaleString() }}
                            </span>
                                    <span>
                                Balance Due : {{'$' + Number(subtotal + (0.05 * subtotal)).toLocaleString() }}
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                invoices: [],
            }
        },
        mounted() {
            axios.get('api/getInvoicesData').then(res => {
                    this.invoices = res.data
                }
            )

        },
        computed: {
            subtotal() {
                var sum = 0;
                for (let val of this.invoices) {
                    sum += (val.price * val.quantity);
                }
                return sum
            }
        },
        methods: {
            deleteInvoice(id) {
                var result = confirm("Want to delete?");
                if (result) {
                    axios.post('api/invoices/delete', {'id': id}).then(res => {
                            console.log(res.data);
                            alert(res.data);
                            location.reload()
                        }
                    )
                }

            }
        }
    }
</script>
