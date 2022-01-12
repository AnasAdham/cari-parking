<template>

  <Head title="User Homepage" />

  <BreezeAuthenticatedLayout>

  <div v-if="$page.props.message.success" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Congratulations  </strong>
    <span class="block sm:inline">{{ $page.props.message.success  }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
  </div>

   <form @submit.prevent="update">
    <div class="h-screen p-4 space-y-6 bg-yellow-100  px-20">
      <div class="flex flex-col sm:flex-row font-bold text-4xl space-x-1">
        <span>Account / </span>
        <span class="text-indigo-400">anasadham</span>
      </div>
      <div class="flex flex-col">
        <div class="bg-white rounded shadow-lg p-6 min-h-min max-w-3xl grid grid-cols-1 md:grid-cols-2 place-content-start gap-y-4 gap-x-10">
          <div class="mb-3">
            <label
              for="exampleFormControlInput1"
              class="form-label inline-block mb-2 text-gray-700"
            >Username</label>
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput1"
              v-model="form.name"
            />
          </div>
          <div class="mb-3">
            <label
              for="exampleFormControlInput1"
              class="form-label inline-block mb-2 text-gray-700"
            >Phone number</label>
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput1"
              v-model="form.phone_number"
            />
          </div>
          <div class="mb-3 row-span-2">
            <label
              for="exampleFormControlInput1"
              class="form-label inline-block mb-2 text-gray-700"
            >Adress</label>
            <textarea
            class=" form-control block w-full h-5/6 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
            v-model="form.address"
            >
            </textarea>
          </div>
          <div class="mb-3">
            <label
              for="exampleFormControlInput1"
              class="form-label inline-block mb-2 text-gray-700"
            >License plate</label>
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="exampleFormControlInput1"
              v-model="form.license_plate"
            />
          </div>
        </div>
        <div class="bg-gray-100  flex justify-between px-4  py-2 max-w-3xl shadow-lg">
          <button class="text-red-500 hover:underline ">Delete</button>
          <button @click="update" class="p-3 bg-indigo-700 hover:bg-yellow-600 hover:text-black text-white font-semibold rounded m-2 text-center">Update</button>
        </div>
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
  props: ["user"],
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        name: this.user.name,
        phone_number: this.user.account.phone_number,
        license_plate: this.user.account.license_plate,
        address: this.user.account.address,
      }),
    }
  },
  methods: {
      update(){
          this.form.put(`/user/${this.user.id}`)
      }
  }

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
