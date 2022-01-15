<template lang="html">
    <Head title="View Reservation" />

    <BreezeAuthenticatedLayout>
        <div class="content bg-blue-100 p-2 space-y-3 pt-5">
            <!-- Table View -->
            <div class="container w-full flex flex-grow mx-auto" >
                <table v-if="notifications.length > 0" class="w-full">
                    <thead>
                        <tr>
                            <th>Parking Name</th>
                            <th>Message</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="notification in notifications" :key="notification.id" class="table-row-border" >
                            <td>{{ notification.data.parking.parking_name }}</td>
                            <td>{{ notification.data.message }}</td>
                            <td> <Button @click="clearNotification(notification)"> View</Button></td>
                        </tr>
                    </tbody>
                </table>
                <div v-else>No notification</div>
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

defineProps(["notifications"]);

function clearNotification(notification){
    Inertia.post('/dashboard/notifications/clear', {
        notification: notification
    });
}

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

