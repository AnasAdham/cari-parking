<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
      <div class="flex flex-col font-bold text-4xl space-x-1">
        <span>Reservation / </span>
        <span class="text-black">View available parking available to reserve</span>
    </div>
        <span class="text-indigo-400 text-xl">Available at {{ reservation_data['date']}} between {{ reservation_data['start']}} and {{ reservation_data['end']}} </span>
        <div class="bg-yellow-100 h-screen p-8 rounded-md w-full hidden md:block">
  <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
    <div class="inline-block min-w-full shadow-lg rounded-lg overflow-hidden">
      <table class="min-w-full leading-normal">
        <thead>
          <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Parking Name</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Parking Status</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Fee amount</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr  v-for="parking in parkings" :key="parking.id" class="table-row-border">
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">{{parking.parking_name}}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">{{parking.parking_status}}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-blue-900 whitespace-no-wrap">{{ reservation_data['fee']}}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
             <Link
                href="/reservation/create"
                method="post"
                class="button"
                :data="{
                    user: $page.props.auth.user.id,
                    parking: parking.id,
                    reservation: reservation_data,
                }"
                >View</Link
            >
              <!-- <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                <span class="relative">Paid</span>
              </span> -->
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Create Card By Joker Banny -->
<div class="md:hidden bg-yellow-100 h-screen">
  <div class="h-max grid grid-cols-1 justify-items-center gap-4 pt-10">
    <div class="row-span-1 w-80 rounded-md cursor-pointer shadow-lg overflow-hidden hover:shadow-xl transform hover:scale-105 duration-500">
      <div class="p-4 bg-white">
        <span class="text-sm font-semibold text-green-900 bg-green-200 py-1 px-3 rounded-full">Paid</span>
        <h1 class="mt-4 font-bold text-2xl">Parking No 1</h1>
        <p>At 2pm until 3pm on 15/12/2021</p>
        <p class="text-blue-500">Amount: RM 5</p>
      </div>
    </div>
    <div class="row-span-1 w-80 rounded-md cursor-pointer shadow-lg overflow-hidden hover:shadow-xl transform hover:scale-105 duration-500">
      <div class="p-4 bg-white">
        <span class="text-sm font-semibold text-red-900 bg-red-200 py-1 px-3 rounded-full">Unpaid</span>
        <h1 class="mt-4 font-bold text-2xl">Parking No 1</h1>
        <p>At 2pm until 3pm on 15/12/2021</p>
        <p class="text-blue-500">Amount: RM 5</p>
      </div>
    </div>
    <div class="row-span-1 w-80 rounded-md cursor-pointer shadow-lg overflow-hidden hover:shadow-xl transform hover:scale-105 duration-500">
      <div class="p-4 bg-white">
        <span class="text-sm font-semibold text-red-900 bg-red-200 py-1 px-3 rounded-full">Unpaid</span>
        <h1 class="mt-4 font-bold text-2xl">Parking No 1</h1>
        <p>At 2pm until 3pm on 15/12/2021</p>
        <p class="text-blue-500">Amount: RM 5</p>
      </div>
    </div>
    <div class="row-span-1 w-80 rounded-md cursor-pointer shadow-lg overflow-hidden hover:shadow-xl transform hover:scale-105 duration-500">
      <div class="p-4 bg-white">
        <span class="text-sm font-semibold text-red-900 bg-red-200 py-1 px-3 rounded-full">Unpaid</span>
        <h1 class="mt-4 font-bold text-2xl">Parking No 1</h1>
        <p>At 2pm until 3pm on 15/12/2021</p>
        <p class="text-blue-500">Amount: RM 5</p>
      </div>
    </div>
    <div class="row-span-1 w-80 rounded-md cursor-pointer shadow-lg overflow-hidden hover:shadow-xl transform hover:scale-105 duration-500">
      <div class="p-4 bg-white">
        <span class="text-sm font-semibold text-red-900 bg-red-200 py-1 px-3 rounded-full">Unpaid</span>
        <h1 class="mt-4 font-bold text-2xl">Parking No 1</h1>
        <p>At 2pm until 3pm on 15/12/2021</p>
        <p class="text-blue-500">Amount: RM 5</p>
      </div>
    </div>
  </div>
</div>
        <!-- <div class="content bg-yellow-100 p-2 space-y-3">
            <div class="container flex justify-start mx-auto">
                <Button class="m-1">Make a reservation</Button>
                <Button class="m-1">View reservation</Button>
            </div>
            <div class="container w-full flex flex-grow mx-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Parking ID</th>
                            <th>Parking Name</th>
                            <th>Parking Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="parking in parkings"
                            :key="parking.id"
                            class="table-row-border"
                        >
                            <td>{{ parking.id }}</td>
                            <td>{{ parking.parking_name }}</td>
                            <td>{{ parking.parking_status }}</td>
                            <td>
                                <Link
                                    href="/reservation/create"
                                    method="post"
                                    class="button"
                                    :data="{
                                        user: $page.props.auth.user.id,
                                        parking: parking.id,
                                        reservation: reservation_data,
                                    }"
                                    >View</Link
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";

import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
  setup() {
    const form = useForm({
      user_id: null,
      parking_id: null,
      reservation_date: null,
      reservation_start: null,
      reservation_end: null,
    });
    return { form };
  },
  components: {
    BreezeAuthenticatedLayout,
    Button,
    Head,
    Input,
    Label,
    Link,
  },
  props: ["parkings", "reservation_data"],
};
</script>

<style scoped>
.content {
  height: 80vh;
}
</style>
