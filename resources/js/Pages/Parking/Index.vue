<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div id="parking-lot" class="hidden md:grid md:grid-cols-5">
            <div class="flex justify-center">
                <div class="my-auto h-96 w-32 bg-blue-100"></div>
            </div>
            <div class="col-span-3">
                <div class=" h-full grid grid-cols-4 container mx-auto bg-gray-300 p-9 gap-y-9 ">
                    <div v-for="parking in parkings" :key="parking.id" :class="parking.parking_status"></div>
                </div>
                <Button v-on:click="getParkingInfo">Click me</Button>
            </div>
            <div class="flex justify-center">
                <div class="my-auto h-96 w-32 bg-blue-100"></div>
            </div>
        </div>
        <div class="grid parking-lot grid-cols-1 sm:grid-cols-2 min-h-full md:hidden gap-2 place-content-center">
            <div :class="parking.parking_status === 'occupied'? 'hidden': ''" v-for="parking in parkings" :key="parking.id" class="flex flex-col items-center justify-center w-full h-32 bg-white text-black rounded-md shadow-md">
                <strong>{{ parking.parking_name}}</strong>
                <p>{{ parking.parking_status}}</p>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Inertia } from "@inertiajs/inertia";

// Inertia.visit(url, {
//   only: ["parkings"],
// });

export default {
    props: ["parkings"],
    components: {
        BreezeAuthenticatedLayout,
        Button,
        Head,
    },
    mounted() {
        this.getParkingInfo();
        this.listen();
    },
    methods: {
        getParkingInfo() {
            // TODO Trigger function to check if the parking is already reserved or not
            // Inertia.post();
            // Get parking info using inertia
            Inertia.reload({ only: ["parkings"] });
            console.log("Getting parking");
        },
        listen() {
            // Listen to channel NewParkingInfo for new parking information
            Echo.channel("new-parking-info").listen("NewParkingInfo", () => {
                console.log("This is working");
            });
        },
    },
};
</script>

<style scoped>
#parking-lot {
    height: 560px;
}
</style>
