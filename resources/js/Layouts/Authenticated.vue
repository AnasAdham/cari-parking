<template>
  <div class="relative min-h-screen md:flex">

    <!-- mobile menu bar -->
    <div class="fixed top-0 left-0 right-0 bg-gray-800 text-gray-100 flex justify-between md:hidden">
      <!-- logo -->
      <a href="#" class="block p-4 text-white font-bold" >Cari Parking</a>

      <!-- mobile menu button -->
      <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
        <svg class="h-5 w-5"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </button>
    </div>
    <SideNav />

    <!-- content -->
    <div class="flex-1 p-10 bg-yellow-100 min-h-screen md:min-h-full pt-20 md:pt-3 ">
      <slot />
    </div>

  </div>
</template>

<script>
import SideNav from "@/Components/Custom/SideNav.vue";
import ExpandRightMenu from "@/Components/Custom/ExpandRightMenu.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

export default {
  components: {
    Link,
    ExpandRightMenu,
    SideNav,
  },
};
</script>

<style scoped>
</style>
