<template>
    <div class="container">
        <div class="flex items-center justify-center h-screen ">
            <div class="bg-white text-black-50 font-bold rounded-lg border shadow-lg p-10 w-auto h-auto" style="">
                <h3>Add Invoice</h3>
                <form id="add_invoice" method="post" class="rounded-3xl register-box border-8">
                    <div class="flex flex-col p-4">
                        <div class="">
                            <input type="text"
                                   name="product_name"
                                   id="product_name"
                                   placeholder="Product Name"
                                   v-model="product_name"
                                   required
                                   class="rounded-xl block h-auto mb-6 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                        <div class="">
                            <input type="number"
                                   name="price"
                                   id="price"
                                   placeholder="Price"
                                   v-model="price"
                                   required
                                   class="rounded-xl block h-auto mb-6 px-3 w-full placeholder-gray-300 text-gray-900 border-2 outline-none focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                        <div class="">
                            <input type="number"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity"
                                   v-model="quantity"
                                   required
                                   class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 outline-none focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                    </div>
                    <div class="flex flex-row p-4">
                        <div class="p-2">
                            <button
                                @click="add"
                                type="button"
                                class="h-8 w-full flex justify-center items-center py-2 px-4 text-sm font-medium rounded-xl bg-indigo-600 hover:bg-indigo-500 focus:outline-none">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product_name : '',
                price : '',
                quantity : '',
            }
        },

        methods: {
            add() {
                var form_data = new FormData();
                form_data.append('product_name',this.product_name);
                form_data.append('price',this.price);
                form_data.append('quantity',this.quantity)
                axios.post('api/invoices/add', form_data).then(res => {
                            alert(res.data)

                        })
                this.$router.push('/')
            },

        }
    }
</script>
