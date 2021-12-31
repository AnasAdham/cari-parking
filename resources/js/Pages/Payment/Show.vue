<template>
  <Head title="User's payment"/>
  <BreezeAuthenticatedLayout>
   <div class="flex flex-col sm:flex-row font-bold text-4xl space-x-1">
    <span>Payment / </span>
    <span class="text-indigo-400">anasadham</span>
  </div>
   <div class="bg-yellow-100 h-screen p-8 rounded-md w-full hidden md:block">
  <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
    <div class="inline-block min-w-full shadow-lg rounded-lg overflow-hidden">
      <table class="min-w-full leading-normal">
        <thead>
          <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date and time</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">Parking No 1</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">2pm to 4pm on 24/04/2021</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-blue-900 whitespace-no-wrap">RM 5</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                <span class="relative">Paid</span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">Parking No 1</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-gray-900 whitespace-no-wrap">2pm to 4pm on 24/04/2021</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <p class="text-blue-900 whitespace-no-wrap">RM 5</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                <span class="relative">Unpaid</span>
              </span>
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
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue"
import {Head} from "@inertiajs/inertia-vue3"
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head
    }

}
</script>

<style>

</style>
