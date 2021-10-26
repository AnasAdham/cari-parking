<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Parking View</h2>
    </template>
    <div id="parking-lot" class="grid grid-cols-5">
      <div class="flex justify-center">
        <div class="my-auto h-96 w-32 bg-blue-100"></div>
      </div>
      <div class="col-span-3">
        <div class="h-full grid grid-cols-4 container mx-auto bg-gray-300 p-9 gap-y-9">
          <div v-for="parking in parkings" :key="parking.id" :class="parking.parking_status"></div>
          <!-- <div class="available"></div>
          <div class="occupied"></div>
          <div class="occupied"></div>
          <div class="available"></div>
          <div class="occupied"></div>
          <div class="available"></div>
          <div class="occupied"></div>
          <div class="available"></div>
          <div class="occupied"></div>-->
        </div>
        <Button v-on:click="getParkingInfo">Click me</Button>
      </div>
      <div class="flex justify-center">
        <div class="my-auto h-96 w-32 bg-blue-100"></div>
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
    getParkingInfo();
    listen();
  },
  methods: {
    getParkingInfo() {
      // Get parking info using inertia
      //  TODO Either use inertia reload or inertia visit depends on working or not
      // TODO else use axious Seems
      // !! Seems to work at tha moment
      Inertia.reload({ only: ["parkings"] });
    },
    listen() {
      // Listen to channel NewParkingInfo for new parking information
      Echo.channel("new-parking-info").listen("NewParkingInfo", () => {
        // Then call getParkingInfo
        getParkingInfo();
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
