<template lang="html">
    <Head title="Reservation Page"> </Head>

    <BreezeAuthenticatedLayout>
        <div class="content bg-yellow-100 p-2 space-y-3">
            <div class="container mx-auto">
                <div class="flex flex-col sm:flex-row font-bold text-4xl space-x-1 mb-10">
                    <span>Reservation  </span>
            </div>

                <div v-if="$page.props.message.error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-12 rounded relative" role="alert">
                    <strong class="font-bold">Oops, sorry...</strong>
                    <span class="block sm:inline">{{ $page.props.message.error  }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>

                <form @submit.prevent="form.get('/reservation/show')">
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
