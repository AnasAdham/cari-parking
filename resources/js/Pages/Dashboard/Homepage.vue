<template lang="html">
  <Head title="View Reservation" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Reservation</h2>
    </template>

    <div class="content bg-blue-100 p-2 space-y-3 pt-5">
      <h1 class="text-3xl container mx-auto">Sort By</h1>
      <div class="container flex justify-start mx-auto">
        <Button class="m-1">All</Button>
        <Button class="m-1">Unpaid</Button>
        <Button class="m-1">Wrong Parking</Button>
      </div>
      <div class="container w-full flex flex-grow mx-auto">
		<table class="w-full">
			<thead>
				<tr>
					<th>NO</th>
					<th>LICENSE PLATE NUMBER</th>
					<th>STATUS</th>
					<th>PAYMENT STATUS</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<tr class="table-row-border">
					<td>1</td>
					<td>D-11</td>
					<td>Reserved</td>
					<td>Paid</td>
					<td><Button class="btn">View</Button></td>
				</tr>
				<tr class="table-row-border">
					<td>1</td>
					<td>D-11</td>
					<td>Reserved</td>
					<td>Paid</td>
					<td><Button class="btn">View</Button></td>
				</tr>
				<tr class="table-row-border">
					<td>1</td>
					<td>D-11</td>
					<td>Reserved</td>
					<td>Paid</td>
					<td><Button class="btn">View</Button></td>
				</tr>
				<tr class="table-row-border">
					<td>1</td>
					<td>D-11</td>
					<td>Reserved</td>
					<td>Paid</td>
					<td><Button class="btn">View</Button></td>
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
};
</script>

<style scoped>
.content {
  height: 90vh;
}
.btn {
  background-color: green;
  padding: 10px;
}
</style>
