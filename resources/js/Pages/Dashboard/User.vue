<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <form @submit.prevent="form.post(`/dashboard/users/${user.id}`)">
        <div class="flex flex-col place-content-center items-center bg-white w-min p-12 h-auto rounded-md shadow">
            <h1>Send your message to user {{ user.name }}</h1>
            <textarea class="  form-control mt-4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                v-model="form.message"
                name="message"
                id="message"
                cols="30"
                rows=""></textarea>
            <Button class="mt-12" @click="sendMessage">Send message</Button>
        </div>
        </form>

    </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import { defineProps, ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3';

function viewUser(user) {
  Inertia.get(`/dashboard/user/${user.id}`);
}

const props = defineProps(["user"]);
const form = useForm({
    message: null,
    user_id: props.user.id,
})

</script>
<script>
</script>

<style scoped>
#parking:hover {
  /* background-color: black; */
  filter: brightness(200%);
}
#parking-lot {
  height: 560px;
}
.content {
  height: 90vh;
}
.btn {
  background-color: green;
  padding: 10px;
}
</style>
