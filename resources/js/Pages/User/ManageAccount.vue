<template>
  <Head title="User Homepage" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Gapo eh sini</h2>
    </template>
    <form action method="post">
      <div class="hero w-screen h-screen mx-auto grid justify-items-center pt-10">
        <div>
          <div class="form-title">
            <h1 class="text-5xl">Manage user</h1>
          </div>
          <div class="form-box">
            <Label :value="username">Username</Label>
            <Input :value="username"></Input>
          </div>
          <div class="form-box">
            <Label :value="password">Password</Label>
            <Input :value="password"></Input>
          </div>
          <div class="form-box">
            <Label :value="email">Email</Label>
            <Input :value="email"></Input>
          </div>
          <div class="form-box">
            <Label :value="phone">Phone</Label>
            <Input :value="phone"></Input>
          </div>
          <div class="form-box">
            <Label :value="license_plate_num">License plate</Label>
            <Input :value="license_plate_num"></Input>
          </div>
          <ButtonSubmit></ButtonSubmit>
        </div>
      </div>
    </form>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import ButtonSubmit from "@/Components/ButtonSubmit.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
  components: {
    BreezeAuthenticatedLayout,
    ButtonSubmit,
    Head,
    Input,
    Label,
  },
};
</script>

<style>
#parking-lot {
  height: 560px;
}
.hero {
  background-color: #ffeedb;
}
.below-hero {
  background-color: #a53860;
}
.form-box {
  margin: 30px;
}
</style>
