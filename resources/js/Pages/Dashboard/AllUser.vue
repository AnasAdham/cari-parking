<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Reservation
            </h2>
        </template>

        <div class="content bg-blue-100 p-2 space-y-3 pt-5">
            <div class="container flex justify-between mx-auto">
                <Input class="" v-model="search" type="text" placeholder="Search.. " />
            </div>
            <!-- Table View -->
            <div class="container w-full flex flex-grow mx-auto" >
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users.data" :key="user.id" class="table-row-border" >
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td> <Button @click="viewUser(user)"> View</Button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container w-full flex flex-grow mx-auto" >
                <div class="inline-flex">
                    <Link class=" bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l "
                        as="button" v-for="link in users.links" :href="link.url" v-html="link.label"
                    ></Link>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

defineProps(["users"]);
let search = ref("");

function viewUser(user) {
  Inertia.get(`/dashboard/users/${user.id}`);
}

watch(search, (value) => {
  // console.log("Changed", value);
  Inertia.get(
    "/dashboard/users",
    { search: value },
    {
      preserveState: true,
    }
  );
});
</script>

<style scoped>
#parking:hover {
  /* background-color: black; */
  filter: brightness(200%);
}
#parking-lot {
  height: 560px;
}
.content {
  height: 90vh;
}
.btn {
  background-color: green;
  padding: 10px;
}
</style>
