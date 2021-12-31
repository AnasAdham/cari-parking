<template>
  <Head title="User Homepage" />

  <BreezeAuthenticatedLayout>
    <div class="h-screen p-4 space-y-6 bg-yellow-100  px-20">
  <div class="flex flex-col sm:flex-row font-bold text-4xl space-x-1">
    <span>Account / </span>
    <span class="text-indigo-400">anasadham</span>
  </div>
  <div class="flex flex-col">
  <div class="bg-white rounded shadow-lg p-6 min-h-min max-w-3xl grid grid-cols-1 md:grid-cols-2 place-content-start gap-y-4 gap-x-10">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Username</label>
      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Example label" />
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">First name</label>
      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Example label" />
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Last name</label>
      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Example label" />
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Adress</label>
      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Example label" />
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">License plate</label>
      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Example label" />
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Example label</label>
      <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput1" placeholder="Example label" />
    </div>
  </div>
  <div class="bg-gray-100  flex justify-between px-4  py-2 max-w-3xl shadow-lg">
    <button class="text-red-500 hover:underline ">Delete</button>
    <button class="p-3 bg-indigo-700 hover:bg-yellow-600 hover:text-black text-white font-semibold rounded m-2 text-center">Update</button>
  </div>
  </div>
</div>
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
.hero {
  background-color: #ffeedb;
}
.below-hero {
  background-color: #a53860;
}
.form-box {
  margin: 30px;
}
.form-input {
  margin: 5px;
  width: 400px;
}
</style>
