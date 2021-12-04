<template>
  <Head title="User Homepage" />

  <BreezeAuthenticatedLayout>
    <div class="hero w-full grid justify-items-center">
      <h1 class="hero-title text-3xl">Find your parking here mate</h1>
      <h1
        class="hero-description text-xl"
      >Using the technology of computer vision it is now possible to see parking woo hebatnyeee</h1>
      <Button :type="button" class="m-1" href="/parking">Find parking</Button>
      <Button :type="button" class="m-1" href="route('reservation.homepage')">Reserve Parking</Button>
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
import Button from "@/Components/Custom/ButtonLink.vue";
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
