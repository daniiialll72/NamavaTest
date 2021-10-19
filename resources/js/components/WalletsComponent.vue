<template>
    <div class="container">
        <div class="flex items-center justify-center h-screen ">
            <div class="bg-white text-black-50 font-bold rounded-lg border shadow-lg p-10 w-2/5 h-4/5" style="">
                <h3>Wallet</h3>
                <form id="card_activation" method="post" class="flex flex-column p-4 rounded-xl register-box border-4 w-4/5 h-4/5">
                    <div class="p-2">
                        <label for="wallet">Owner</label>
                        <select id="wallet" name="wallet" v-model="user_id" @change="getWalletData" class="rounded-xl block h-auto mb-2 px-3 w-3/5 placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500">
                            <option v-for="user in users" :value="user.id">{{user.name}}</option>
                        </select>
                    </div>
                    <div class="p-2 mt-4">
                        <span>Balance:  {{this.balance}} </span>
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
                users : '',
                balance : '',
                user_id : '',
            }
        },
        mounted() {
            axios.get('api/getUsersData').then(res => {
                    this.users = res.data
                }
            )

        },
        methods: {
            getWalletData() {
                axios.post('api/wallet/index', {'user_id': this.user_id}).then(res => {
                    this.balance = res.data.balance
                        });
            },

        }
    }
</script>
