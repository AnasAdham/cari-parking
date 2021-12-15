<template lang="html">
    <Head title="Reservation Page"> </Head>

    <BreezeAuthenticatedLayout>
        <template #header class="bg-yellow-100">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reserve your parking spot
            </h2>
        </template>

        <div class="content bg-yellow-100 p-2 space-y-3">
            <div class="container flex justify-start">
                <Link
                    :href="route('reservation.homepage')"
                    class="button"
                    :active="route().current('reservation.homepage')"
                    >Make a reservation</Link
                >
                <Link
                    :href="
                        route('reservation.show', {
                            id: $page.props.auth.user,
                        })
                    "
                    :active="route().current('reservation.show')"
                    class="button"
                    >View Reservations</Link
                >
                <h1>{{ $page.props.auth.user.id }}</h1>
            </div>
            <div class="container h-full flex justify-center">
                <form @submit.prevent="form.post('/reservation')">
                    <Label class="text-2xl">Date</Label>
                    <Input v-model="form.reservation_date" type="date"></Input>
                    <Label class="text-2xl">From</Label>
                    <Input v-model="form.reservation_start" type="time"></Input>
                    <Label class="text-2xl">To</Label>
                    <Input v-model="form.reservation_end" type="time"></Input>
                    <button
                        class="ml-3"
                        type="submit"
                        :disabled="form.processing"
                    >
                        Reserve
                    </button>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import Link from "@/Components/NavLink.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
    setup() {
        const form = useForm({
            reservation_date: null,
            reservation_start: null,
            reservation_end: null,
        });
        return { form };
    },
    components: {
        BreezeAuthenticatedLayout,
        Button,
        Head,
        Input,
        Label,
        Link,
    },
};
</script>

<style scoped>
.content {
    height: 80vh;
}
</style>
