<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Reservation
            </h2>
        </template>
        <div class="content bg-blue-100 p-2 space-y-3 pt-5">
            <div class="container mx-auto">
                <h1 class="mb-8 text-3xl font-bold">
                    <Link class="text-indigo-400 hover:text-indigo-600" :href="route('dashboard.parking')"
                        >Parking  </Link
                    >
                    <span class="text-indigo-400 font-medium">/  </span>
                    {{ parking.parking_name }}
                </h1>
                <div class="grid grid-cols-5 max-w-3xl bg-gray-300 rounded-md shadow overflow-hidden p-5 " >
                    <div class="m-3 col-span-1">
                        <Label class="text-xl" value="Parking Id"></Label>
                        <h1>{{ parking.id }}</h1>
                        <!-- <Input class="w-full" :value="parking.parking_id" ></Input> -->
                    </div>
                    <div class="m-3 col-span-2">
                        <Label class="text-xl" value="Parking Name"></Label>
                        <h1 class="w-full">{{ parking.parking_name }}</h1>
                        <!-- <Input class="w-full" :value="parking.parking_name" ></Input> -->
                    </div>
                    <div class="m-3 col-span-2">
                        <Label class="text-xl" value="Parking Status"></Label>
                        <h1 class="w-full" :class="`text-${parking.parking_status}`">{{ parking.parking_status }}</h1>
                        <!-- <Input class="w-full" :value="parking.parking_status" ></Input> -->
                    </div>
                    <div v-if="!hasReservation" class="col-span-5 text-indigo-400">Parking is not yet reserved</div>
                    <div v-if="hasReservation" class="m-3 col-span-4">
                        <Label class="text-xl" value="The parking is currently parked by:"></Label>
                        <Input class="w-full" :value="reservation.reservation_user" readonly></Input>
                    </div>
                    <div v-if="hasReservation" class="m-3 col-span-1">
                        <Label class="text-xl" value="with id"></Label>
                        <Input class="w-full" :value="reservation.id" readonly></Input>
                    </div>
                    <div class="col-span-5 flex flex-row">
                        <Link v-if="hasReservation" class="butang m-2" as="button">View Reservation</Link>
                    </div>

                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { ref, computed } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps(["parking", "reservation"]);

function clickme() {
  console.log();
}
</script>
<script>
export default {
  computed: {
    hasReservation: function () {
      return this.reservation !== null;
    },
  },
  props: ["parking", "reservation"],
};
</script>

<style scoped>
.content {
  height: 90vh;
}

.text-available {
  color: green;
}
.text-occupied {
  color: orange;
}
</style>
