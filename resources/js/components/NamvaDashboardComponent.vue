<template>
    <div>
        <div class="container">
            <div class="flex items-center justify-center h-screen">
                <div class="bg-white text-black-50 font-bold rounded-lg border shadow-lg p-10 w-auto h-auto">
                    <div class="flex flex-row p-2">
                        <div class="w-1/4 bg-white text-black-50 font-bold rounded-lg border shadow-md py-1 w-auto">
                            <span class="p-1">Create Cards</span>
                        </div>
                        <!--<div class="w-2/4 ...2 "></div>-->
                    </div>
                    <div class="flex flex-row space-x-20 p-2">
                        <div>
                            <label for="type">Duration</label>
                            <select name="type" id="type" v-model="duration"
                                    class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
                                <option selected value="1">1 month</option>
                                <option value="3">3 months</option>
                                <option value="12">12 months</option>
                            </select>
                        </div>
                        <div>
                            <label for="qnt">quantity</label>
                            <br>
                            <input name="qnt" id="qnt" v-model="qnt" type="number" maxlength="100" class="border bold text-center" placeholder="quantity"/>
                        </div>
                        <div class="mt-4">
                            <button class="bg-pink-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded" v-on:click="cardGenerate">
                                Create
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-row space-x-20 p-2">
                        <div>
                            <label for="sales">Salesman</label>
                            <select name="sales" id="sales" v-model="user_id"
                                    class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
                                <option v-for="user in users" :value="user.id" v-if="user.level == 2">{{user.name}}</option>
                            </select>
                        </div>
                        <div>
                            <label for="type">Duration</label>
                            <select name="type" v-model="length"
                                    class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
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
                            <button class="bg-pink-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded" v-on:click="saleAssignment">
                                Assign
                            </button>
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
                user_id: '',
            }
        },
        mounted() {
            axios.get('api/getUsersData').then(res => {
                    this.users = res.data
                }
            )

        },
        computed: {},
        methods: {
            cardGenerate() {
                axios.post('api/cards/add', {'duration': this.duration, 'qnt': this.qnt}).then(res => {
                        alert(res.data);
                        location.reload()
                    }
                )
            },
            saleAssignment() {
                axios.post('api/cards/salesAssign', {'duration': this.length, 'user_id': this.user_id, 'amount': this.amount}).then(res => {
                        console.log(res.data);
                        alert(res.data);
                        location.reload()
                    }
                )
            }
        }
    }
</script>
