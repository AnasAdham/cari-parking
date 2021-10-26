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
        <div class="h-3/6 grid grid-cols-5 container mx-auto bg-gray-300 p-9">
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
        </div>
        <div class="h-3/6 grid grid-cols-5 container mx-auto bg-gray-300 p-9">
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
          <div class="parking-spot"></div>
        </div>
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

Inertia.visit(url, {
  only: ["parkings"],
});

export default {
  components: {
    BreezeAuthenticatedLayout,
    Button,
    Head,
  },
  props: ["parkings", "success-message"],
};
</script>

<style scoped>
#parking-lot {
  height: 560px;
}
</style>
