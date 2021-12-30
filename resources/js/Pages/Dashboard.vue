<template>

  <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
    <div class="bg-red-400 p-5">1 user</div>
    <div class="bg-red-400 p-5">2 user</div>
    <div class="bg-red-400 p-5">3 user</div>
    <div class="bg-red-400 p-5">4 user</div>
    <div class="bg-red-400 p-5">5 user</div>
    <div class="bg-red-400 p-5">6 user</div>
    <div class="bg-red-400 p-5">7 user</div>
    <div class="bg-red-400 p-5">8 user</div>
  </div>

</template>

<script>
export default {
  props: ["parkings"],
  components: {},
  mounted() {
    this.getParkingInfo();
    this.listen();
  },
  methods: {
    getParkingInfo() {
      // TODO Trigger function to check if the parking is already reserved or not
      // Inertia.post();
      // Get parking info using inertia
      Inertia.reload({ only: ["parkings"] });
      console.log("Getting parking");
    },
    listen() {
      // Listen to channel NewParkingInfo for new parking information
      Echo.channel("new-parking-info").listen("NewParkingInfo", () => {
        console.log("This is working");
      });
    },
  },
};
</script>

<style scoped>
#parking-lot {
  height: 560px;
}
</style>
