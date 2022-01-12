<template>

  <Head title="Payment" />
  <BreezeAuthenticatedLayout>

  <div v-if="$page.props.message.success" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Congratulations  </strong>
    <span class="block sm:inline">{{ $page.props.message.success  }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
  </div>
      <div class="h-screen p-4 space-y-6 bg-yellow-100  px-20">
        <div class="flex flex-col sm:flex-row font-bold text-4xl space-x-1">
          <span>Payment / </span>
          <span class="text-indigo-400">for reservation {{ payment.id}}</span>
        </div>
        <div class="flex flex-col">
          <div class="bg-white rounded shadow-lg p-6 min-h-min max-w-3xl grid grid-cols-1 md:grid-cols-2 place-content-start gap-y-4 gap-x-10">
            <div class="mb-3">
              <label
                for="exampleFormControlInput1"
                class="form-label inline-block mb-2 text-gray-700"
              >Reservation ID</label>
              <h1> {{ payment.id}}</h1>
            </div>
            <div class="mb-3">
              <label
                for="exampleFormControlInput1"
                class="form-label inline-block mb-2 text-gray-700"
              >Payment fee</label>
              <h1> RM {{ payment.fee}}</h1>
            </div>
            <div class="mb-3">
              <label
                for="exampleFormControlInput1"
                class="form-label inline-block mb-2 text-gray-700"
              >Reservation date</label>
            <h1> {{ payment.reservation.reservation_date }}</h1>
            </div>
            <div class="mb-3">
              <label
                for="exampleFormControlInput1"
                class="form-label inline-block mb-2 text-gray-700"
              >Reservation time</label>
            <h1> {{ payment.reservation.reservation_start }} until {{ payment.reservation.reservation_end }}</h1>
            </div>
            <div class="mb-3">
              <label
                for="exampleFormControlInput1"
                class="form-label inline-block mb-2 text-gray-700"
              >Payment Status</label>
              <h1> {{payment.status}}</h1>
            </div>
          </div>
          <div class="bg-gray-100  flex justify-between px-4  py-2 max-w-3xl shadow-lg">
            <button class="text-red-500 hover:underline ">Delete</button>
            <Link v-if="payment.status == `Unpaid`" class="butang" href="/payment/store"
                method="post"
                as="button"
                :data="{
                    id: payment.id,
                    fee: payment.fee,
                    user_id: payment.user_id,
                    reservation_id: payment.reservation_id,
                }"
            >Pay</Link>
          </div>
        </div>
      </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue3";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Inertia } from '@inertiajs/inertia';

export default {
  components: {
    Link,
    BreezeAuthenticatedLayout,
    Head,
  },
  props: ['response', 'payment'],
};
</script>

<style>
</style>
