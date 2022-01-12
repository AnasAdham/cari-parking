<template>
  <Head title="User's payment"/>
  <BreezeAuthenticatedLayout>
   <div class="flex flex-col sm:flex-row font-bold text-4xl space-x-1">
    <span>Reservation / </span>
    <span class="text-indigo-400">{{ $page.props.auth.user.name }}</span>
  </div>
   <div class="bg-yellow-100 h-screen p-8 rounded-md w-full hidden md:block">
  <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
    <div class="inline-block min-w-full shadow-lg rounded-lg overflow-hidden">
      <table class="min-w-full leading-normal">
        <thead>
          <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Reservation Date</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Reservation Time</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Parking Lot</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">View</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations.data" :key="reservation.id">
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">{{ reservation.reservation_date}}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">{{ reservation.reservation_start}} until {{ reservation.reservation_end}}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-blue-900 whitespace-no-wrap">{{ reservation.parking.parking_name}}</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <Button>Click me</Button>
            </td>
          </tr>
        </tbody>
      </table>
    <div v-show="!reservations.data" class="px-6 py-6 flex flex-col justify-items-center w-full h-32 text-blue-900 text-2xl bg-white text-center font-semibold">
        <div>You have not perform any reservations</div>
        <div><Link as="button" href="/reservation" :data="{ user: $page.props.auth.user.id}" class="butang w-auto text-center">Click here to make reservation</Link></div>
    </div>
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
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue"
import {Head} from "@inertiajs/inertia-vue3"
import Button from "@/Components/Button.vue"
import { Link } from "@inertiajs/inertia-vue3"
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Button,
        Link,
    },
    props: ["reservations"]

}
</script>

<style>

</style>
