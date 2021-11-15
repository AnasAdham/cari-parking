<template lang="html">
  <Head title="Reservation Page" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reserve your parking spot</h2>
    </template>

    <div class="content bg-yellow-100 p-2 space-y-3">
      <div class="container flex justify-start">
        <Button class="m-1">Make a reservation</Button>
        <Button class="m-1">View reservation</Button>
      </div>
      <div class="container h-full flex justify-center">
      <div class="">
        <Input type="date"></Input>
        <Button class="ml-3">Reserve</Button>
      </div>
      </div>
    </div>


  </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";

import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Button,
    Head,
    Input,
    Label,
  },
};
</script>

<style scoped>
.content {
  height: 80vh;
}
</style>
