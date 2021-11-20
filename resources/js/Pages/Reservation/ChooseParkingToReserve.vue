<template lang="html">
  <Head title="View Reservation" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Reservation</h2>
    </template>

    <div class="content bg-yellow-100 p-2 space-y-3">
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
					<th>Parking User</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="parking in parkings" :key="parking.id" class="table-row-border">
					<td>{{ parking.id }}</td>
					<td>{{ parking.parking_name }}</td>
					<td>{{ parking.parking_status }}</td>
					<td>{{ parking.parking_user }}</td>
					<td><button class="btn">View</button></td>
				</tr>
			</tbody>
		</table>
      </div>
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
  props: ["parkings"],
};
</script>

<style scoped>
.content {
  height: 80vh;
}
</style>
