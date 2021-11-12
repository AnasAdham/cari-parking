<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Parking View</h2>
    </template>
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
  components: {
    BreezeAuthenticatedLayout,
    Button,
    Head,
  },
};
</script>

<style scoped>
#parking-lot {
  height: 560px;
}
</style>
