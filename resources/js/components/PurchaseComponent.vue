<template>
    <div class="container">
        <div class="flex items-center justify-center h-screen ">
            <div class="bg-white text-black-50 font-bold rounded-lg border shadow-lg p-10 w-auto h-auto" style="">
                <h3>Card Activation</h3>
                <form id="card_activation" method="post" class="rounded-3xl register-box border-8">
                    <div class="flex flex-col p-2">
                        <div class="">
                            <input type="text"
                                   name="code_number"
                                   placeholder="Please enter your SN"
                                   v-model="code_number"
                                   required
                                   class="rounded-xl block h-auto mb-2 px-3 w-full placeholder-gray-300 text-gray-900 border-2 focus:ring-blue-500 focus:border-blue-500"/>
                        </div>
                    </div>
                    <div class="flex flex-row p-1">
                            <button
                                @click="register"
                                type="button"
                                class="h-8 w-full flex justify-center items-center py-2 px-4 text-sm font-medium rounded-xl bg-indigo-600 hover:bg-indigo-500 focus:outline-none">
                                Register
                            </button>
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
                code_number : '',
            }
        },

        methods: {
            register() {
                axios.post('api/cards/register', {'code_number': this.code_number}).then(res => {
                            alert(res.data)
                        });
            },

        }
    }
</script>
