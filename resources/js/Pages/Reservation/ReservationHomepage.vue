<template lang="">
  <Head title="Reservation Page" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reserve your parking spot</h2>
    </template>
    <div class="flex float-left p-3">
        <Button class="m-1">Input 1</Button>
        <Button class="m-1">Input 1</Button>
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
