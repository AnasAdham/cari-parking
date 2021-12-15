<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Reservation
            </h2>
        </template>
        <h1>{{ parking.parking_name }}</h1>
        <div v-if="testing">
            <h1>{{ user.name }}</h1>
        </div>
        <Button @click="clickme()">Click me</Button>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
import { ref } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";

let testing = ref(true);
function clickme() {
    testing.value = !testing.value;
    // this.testing = !this.testing;
}
</script>
<script>
export default {
    props: ["parking", "user"],
};
</script>

<style scoped></style>
