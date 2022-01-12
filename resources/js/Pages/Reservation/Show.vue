<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <div class="content p-2 space-y-3 pt-5">
            <div class="container mx-auto">
                <h1 class="mb-8 text-3xl font-bold">
                    <Link class="text-indigo-400 hover:text-indigo-600" :href="route('reservation.show')"
                        >Reservation  </Link
                    >
                    <span class="text-indigo-400 font-medium">/  </span>
                    {{ reservation.id }}
                </h1>
                <div class="grid grid-cols-5 max-w-3xl bg-gray-300 rounded-md shadow overflow-hidden p-5 " >
                    <div class="m-3 col-span-2">
                        <Label class="text-xl" value="Parking Name"></Label>
                        <h1 class="w-full"> {{reservation.parking.parking_name }}</h1>
                    </div>
                    <div class="m-3 col-span-2">
                        <Label class="text-xl" value="Parking Status"></Label>
                        <h1 class="w-full"> {{ reservation.parking.parking_status}}</h1>
                    </div>
                    <div v-if="!hasReservation" class="col-span-5 text-indigo-400">Parking is not yet reserved</div>
                    <div v-if="hasReservation" class="m-3 col-span-4">
                        <Label class="text-xl" value="The parking is currently parked by:"></Label>
                        <h1 class="w-full"> {{ reservation.user.name}}</h1>
                    </div>
                    <div v-if="hasReservation" class="m-3 col-span-1">
                        <Label class="text-xl" value="with id"></Label>
                        <h1 class="w-full"> {{ reservation.user.id}}</h1>
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
  props: ["reservation"],
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
