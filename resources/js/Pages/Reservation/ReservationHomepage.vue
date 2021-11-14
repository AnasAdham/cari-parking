<template lang="html">
  <Head title="Reservation Page" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reserve your parking spot</h2>
    </template>
  
    <div class="bg-yellow-100 grid grid-rows-1 px-3 py-5 gap-3">
      <div class="flex float-left">
        <Button class="m-1">Input 1</Button>
        <Button class="m-1">Input 2</Button>
      </div>
      <div class="container h-full">
        <Input type="date"></Input>
        <Button class="ml-3">Reserve</Button>
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

<style lang="">
</style>
