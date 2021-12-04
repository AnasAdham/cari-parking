<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Reservation
            </h2>
        </template>

        <div class="content bg-yellow-100 p-2 space-y-3">
            <div class="container flex justify-start mx-auto">
                <Button class="m-1">Make a reservation</Button>
                <Button class="m-1">View reservation</Button>
            </div>
            <div class="container w-full flex flex-grow mx-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Parking ID</th>
                            <th>Parking Name</th>
                            <th>Parking Status</th>
                            <th>Parking User</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="parking in parkings"
                            :key="parking.id"
                            class="table-row-border"
                        >
                            <td>{{ parking.id }}</td>
                            <td>{{ parking.parking_name }}</td>
                            <td>{{ parking.parking_status }}</td>
                            <td>{{ parking.parking_user }}</td>
                            <td>
                                <Link
                                    href="/reservation/create"
                                    method="post"
                                    class="
                                        bg-blue-500
                                        hover:bg-blue-700
                                        text-white
                                        font-bold
                                        py-2
                                        px-4
                                        rounded
                                    "
                                    :data="{
                                        user: $page.props.auth.user.id,
                                        parking: parking.id,
                                        reservation: reservation_data,
                                    }"
                                    >View</Link
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";

import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
    setup() {
        const form = useForm({
            user_id: null,
            parking_id: null,
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
    props: ["parkings", "reservation_data"],
};
</script>

<style scoped>
.content {
    height: 80vh;
}
</style>
