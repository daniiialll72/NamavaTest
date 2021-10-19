<template>
    <div>
        <div class="container">
            <div class="flex items-center justify-center h-screen">
                <div class="bg-white text-black-50 font-bold rounded-lg border shadow-lg p-10 w-auto h-auto">
                    <div class="flex flex-row p-2">
                        <div class="flex flex-row space-x-20 p-2">
                            <div>
                                <label for="salesman">Salesman</label>
                                <select name="salesman" id="salesman" v-model="sale_id" class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option v-for="user in users" :value="user.id" v-if="user.level == 2">{{user.name}}</option>
                                </select>
                            </div>
                            <div>
                                <label for="shopkeepr">Shopkeepr</label>
                                <select name="shopkeepr" id="shopkeepr" v-model="shop_id" class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option v-for="user in users" :value="user.id" v-if="user.level == 3">{{user.name}}</option>
                                </select>
                            </div>
                            <div>
                                <label for="duration">Duration</label>
                                <select name="duration" id="duration" v-model="length" class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option selected value="1">1 month</option>
                                    <option value="3">3 months</option>
                                    <option value="12">12 months</option>
                                </select>
                            </div>
                            <div>
                                <label for="amount">Amount</label>
                                <br>
                                <input name="amount" id="amount" v-model="amount" type="number" class="border bold text-center" placeholder="quantity"/>
                            </div>
                            <div class="mt-4">
                                <button class="bg-pink-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded" v-on:click="shopAssignment">
                                    Add
                                </button>
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
                users: [],
                duration: '',
                qnt: 0,
                amount: 0,

                length: 0,
                user_id: 0,
                sale_id: 0,
                shop_id: 0,
            }
        },
        mounted() {
            axios.get('api/getUsersData').then(res => {
                    this.users = res.data
                console.log(this.users)
                }
            )

        },
        computed: {
        },
        methods: {
            shopAssignment() {
                // var result = confirm("Want to delete?");
                axios.post('api/cards/shopAssign', {'duration': this.length, 'sale_id': this.sale_id, 'shop_id': this.shop_id, 'amount': this.amount}).then(res => {
                        console.log(res.data);
                        alert(res.data);
                        // location.reload()
                    }
                )
            }
        }
    }
</script>
