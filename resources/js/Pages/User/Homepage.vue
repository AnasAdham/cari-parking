<template>
  <Head title="User Homepage" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Gapo eh sini</h2>
    </template>
    <div class="hero w-full grid justify-items-center">
      <h1 class="hero-title text-3xl">Find your parking here mate</h1>
      <h1
        class="hero-description text-xl"
      >Using the technology of computer vision it is now possible to see parking woo hebatnyeee</h1>
      <Button class="m-1">Find parking</Button>
      <Button class="m-1">Reserve Parking</Button>
      <div class="mt-3"></div>
    </div>
    <div class="w-full h-screen below-hero flex justify-center mx-auto">
      <Card></Card>
      <Card></Card>
      <Card></Card>
    </div>
  </BreezeAuthenticatedLayout>
</template>


<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import Card from "@/Components/Card.vue";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Button,
    Head,
    Card,
  },
};
</script>

<style scoped>
#parking-lot {
  height: 560px;
}
.hero {
  background-color: #ffeedb;
}
.below-hero {
  background-color: #a53860;
}
</style>
