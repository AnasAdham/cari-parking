<template lang="html">
    <Head title="Reservation Page"> </Head>

    <BreezeAuthenticatedLayout>
        <div class="content bg-yellow-100 p-2 space-y-3">
            <div class="container mx-auto">
                <h1 class="mb-8 text-3xl font-bold">
                    <Link class="text-indigo-400 hover:text-indigo-600" :href="route('dashboard.parking')" >Parking </Link>
                </h1>

                <form @submit.prevent="form.post('/reservation')">
                    <div class="grid grid-cols-2 max-w-xl bg-gray-300 rounded-md shadow overflow-hidden p-5 " >
                        <div class="m-3 col-span-2">
                            <Label class="text-2xl">Date</Label>
                            <Input class="w-full" v-model="form.reservation_date" type="date"></Input>
                        </div>
                        <div class="m-3 col-span-1">
                            <Label class="text-2xl">From</Label>
                            <Input class="w-full" v-model="form.reservation_start" type="time"></Input>
                        </div>
                        <div class="m-3 col-span-1">
                            <Label class="text-2xl">To</Label>
                            <Input class="w-full" v-model="form.reservation_end" type="time"></Input>
                        </div>
                    </div>
                        <div class="grid grid-cols-2 mt-5 max-w-xl">
                            <div class="m-3 col-span-1 ">
                                <Button class="w-full bg-red-300" type="submit" :disabled="form.processing" >Clear form</Button>
                            </div>
                            <div class="m-3 col-span-1 ">
                                <Button class="w-full" :type="submit" :disabled="form.processing"> Reserve </Button>
                            </div>
                        </div>
                </form>
            </div>
            <!-- <div class="container h-full flex justify-center">
                    <Label class="text-2xl">Date</Label>
                    <Input v-model="form.reservation_date" type="date"></Input>
                    <Label class="text-2xl">From</Label>
                    <Input v-model="form.reservation_start" type="time"></Input>
                    <Label class="text-2xl">To</Label>
                    <Input v-model="form.reservation_end" type="time"></Input>
                    <button
                        class="ml-3"
                        type="submit"
                        :disabled="form.processing"
                    >
                        Reserve
                    </button>
                </form>
            </div> -->
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
  setup() {
    const form = useForm({
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
};
</script>

<style scoped>
.content {
  height: 80vh;
}
</style>
