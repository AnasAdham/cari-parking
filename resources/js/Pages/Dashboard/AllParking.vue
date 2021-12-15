<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Reservation
            </h2>
        </template>

        <div class="content bg-blue-100 p-2 space-y-3 pt-5">
            <div class="container flex justify-between mx-auto">
                <Button @click="toggleView" class="m-1">
                    <p v-if="tableView">Show Parking View</p>
                    <p v-if="parkingView">Show Table View</p>
                </Button>
                <Input
                    class=""
                    v-model="search"
                    type="text"
                    placeholder="Search.. "
                />
            </div>
            <!-- Table View -->
            <div
                v-if="tableView"
                class="container w-full flex flex-grow mx-auto"
            >
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>USER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="parking in parkings.data"
                            :key="parking.id"
                            class="table-row-border"
                        >
                            <td>{{ parking.id }}</td>
                            <td>{{ parking.parking_name }}</td>
                            <td>{{ parking.parking_status }}</td>
                            <td>{{ parking.parking_user }}</td>
                            <td>
                                <Link
                                    :href="
                                        route('reservation.show.parking', {
                                            id: parking.id,
                                        })
                                    "
                                    >View Parking</Link
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Parking View -->
            <div
                v-if="parkingView"
                class="container w-full flex flex-grow mx-auto"
            >
                Show the parking view for the dashboard please
            </div>
            <div class="container w-full flex flex-grow mx-auto">
                <div class="inline-flex">
                    <Link
                        class="
                            bg-gray-300
                            hover:bg-gray-400
                            text-gray-800
                            font-bold
                            py-2
                            px-4
                            rounded-l
                        "
                        as="button"
                        v-for="link in parkings.links"
                        :href="link.url"
                        v-html="link.label"
                    ></Link>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

defineProps(["parkings"]);
let search = ref("");
let parkingView = ref(false);
let tableView = ref(true);

function toggleView() {
    // this.parkingView = !this.parkingView;
    // this.tableView = !this.parkingView;
    parkingView.value = !parkingView.value;
    tableView.value = !parkingView.value;
}

watch(search, (value) => {
    // console.log("Changed", value);
    Inertia.get(
        "/dashboard/parking",
        { search: value },
        {
            preserveState: true,
        }
    );
});
</script>

<style scoped>
.content {
    height: 90vh;
}
.btn {
    background-color: green;
    padding: 10px;
}
</style>
