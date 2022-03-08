<template>
    <div>
        <ul class="h-96 p-2 overflow-auto">
            <li v-for="(message, key) in messages" :key="key">
                <div v-if="auth == message.user_id">
                    <div class="flex flex-row-reverse align-items-start mb-4">
                        <div class="pt-4">
                            <div
                                class="rounded-circle bg-yellow-300 text-white fs-3 w-12 h-12 mr-2 text-center leading-5"
                            >
                                <div class="pt-2">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div>
                                {{ message.created_at | moment }}
                            </div>

                            <div class="pt-2">
                                <div class="text-right">
                                    <div
                                        class="text-black text-lg p-2 me-2 mb-0 bg-white inline-block py-1 px-2 rounded"
                                    >
                                        {{ message.message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="flex align-items-start mb-4">
                        <div class="pt-4">
                            <div
                                class="rounded-circle bg-secondary text-white fs-3 w-12 h-12 mr-2 text-center leading-5"
                            >
                                <div class="pt-2">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div>
                                {{ message.created_at | moment }}
                            </div>
                            <div class="pt-2">
                                <div
                                    class="text-black text-lg p-2 me-2 mb-0 bg-white inline-block py-1 px-2 rounded"
                                >
                                    {{ message.message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div
            class="my-3 py-3 px-3 rounded-lg bg-indigo-500 text-sm flex flex-col md:flex-row flex-grow"
        >
            <input
                v-model.trim="text"
                class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto"
            />
            <button
                @click="postMessage"
                :disabled="!textExists"
                class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-white"
            >
                <img :src="'/images/send.png'" width="27px" height="27px" />
            </button>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    props: ["auth"],
    data() {
        return {
            text: "",
            messages: [],
        };
    },
    computed: {
        textExists() {
            return this.text.length > 0;
        },
    },
    created() {
        this.getMessages();
        Echo.channel("connect").listen("MessageSentEvent", (e) => {
            console.log("echo channel");
            console.log(e);
            this.messages.push({
                message: e.message.message,
                user_id: e.message.user_id,
                // created_at: e.message.created_at,
            });
        });
    },
    filters: {
        moment: function (date) {
            return moment(date).format("YYYY/MM/DD HH:mm");
        },
    },
    methods: {
        getMessages() {
            axios.get("/messages").then((response) => {
                console.log("get");
                console.log(response);
                this.messages = response.data;
            });
        },
        postMessage(message) {
            axios.post("/messages", { message: this.text }).then((response) => {
                console.log("post");
                console.log(response);
                this.text = "";
            });
        },
    },
};
</script>
