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
                <Input v-if="tableView" class="" v-model="search" type="text" placeholder="Search.. " />
            </div>
            <!-- Table View -->
            <div v-if="tableView" class="container w-full flex flex-grow mx-auto" >
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="parking in parkings.data" :key="parking.id" class="table-row-border" >
                            <td>{{ parking.id }}</td>
                            <td>{{ parking.parking_name }}</td>
                            <td>{{ parking.parking_status }}</td>
                            <td> <Button @click="viewParking(parking)"> View</Button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Parking View -->
            <div v-if="parkingView" id="parking-lot" class="grid grid-cols-5">
                <div class="flex justify-center">
                    <div class="my-auto h-96 w-32 bg-blue-100"></div>
                </div>
                <div class="col-span-3">
                    <div class=" h-full grid grid-cols-4 container mx-auto bg-gray-300 p-9 gap-y-9 " >
                        <div v-for="parking in parkings.data" @click="viewParking(parking)"
                            :key="parking.id"
                            class=" grid place-items-center text-white text-xl uppercase "
                            :class="`${parking.parking_status} `"
                            id="parking"
                        > {{ parking.parking_name }} </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="my-auto h-96 w-32 bg-blue-100"></div>
                </div>
            </div>
            <div v-if="tableView" class="container w-full flex flex-grow mx-auto" >
                <div class="inline-flex">
                    <Link class=" bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l "
                        as="button" v-for="link in parkings.links" :href="link.url" v-html="link.label"
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
let hover = ref("");

function viewParking(parking) {
  Inertia.get(`/dashboard/parking/${parking.id}`);
}
function toggleView() {
  // this.parkingView = !this.parkingView;
  // this.tableView = !this.parkingView;
  parkingView.value = !parkingView.value;
  tableView.value = !parkingView.value;
  if (parkingView.value) {
    search.value = "";
  }
}

watch(search, (value) => {
  // console.log("Changed", value);
  Inertia.get(
    "/dashboard/parkings",
    { search: value },
    {
      preserveState: true,
    }
  );
});
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
