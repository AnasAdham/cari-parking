<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Reservation
            </h2>
        </template>

        <div class="content bg-yellow-100 p-2 space-y-3">
            <div class="container flex justify-start mx-auto"></div>
            <div class="container w-full flex flex-grow mx-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Reservation Date</th>
                            <th>Reservation Start Time</th>
                            <th>Reservation End Time</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="reservation in reservations"
                            :key="reservation.id"
                            class="table-row-border"
                        >
                            <td>{{ reservation.id }}</td>
                            <td>{{ reservation.reservation_date }}</td>
                            <td>{{ reservation.reservation_start }}</td>
                            <td>{{ reservation.reservation_end }}</td>
                            <td>
                                <Link>View</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="!reservations.length">
                <h1>No reservation</h1>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import Link from "@/Components/NavLink.vue";

import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Button,
        Head,
        Input,
        Label,
        Link,
    },
    props: ["reservations"],
};
</script>

<style scoped>
.content {
    height: 80vh;
}
</style>
