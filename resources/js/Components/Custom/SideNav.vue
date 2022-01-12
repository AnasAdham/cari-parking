<template>
    <!-- sidebar -->
    <div class="sidebar absolute top-0 bg-blue-800 text-blue-100 w-64 space-y-6 py-7 px-2 inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-10">

      <!-- logo -->
      <Link
        href="/"
        class="text-white flex items-center space-x-2 px-4"
      >
      <BreezeApplicationLogo class="w-8 h-8"/>
        <span class="text-2xl font-extrabold">Cari Parking</span>
      </Link>

      <!-- nav -->
      <nav v-if="$page.props.auth.user.user_type === `admin`">
        <!-- <a
          href="#"
          class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
        >
          Dashboard
        </a> -->
        <Link
          href="/dashboard/parkings"
          class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
        >
          Parking
        </Link>
        <hr>
        <div class="dropdown block mt-5 py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
          <Link class="dropbtn">{{ $page.props.auth.user.name }}</Link>
          <div class="dropdown-content">
              <Link :href="route('logout')" method="post" >Logout</Link>
          </div>
        </div>
      </nav>
      <nav v-if="$page.props.auth.user.user_type === `customer`">
        <Link
          href="/parking"
          class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
        > Parking </Link>
        <!-- <div class="dropdown block mb-2 py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
          <Link class="dropbtn">Reservation</Link>
          <div class="dropdown-content">
              <Link :href="`/reservation/user/`">View reservation</Link>
              <Link href="/reservation">Make reservation</Link>
          </div>
        </div> -->
        <Link
          :href="`/reservation`"
          class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
        >
          Make reservation
        </Link>
        <Link
          :href="`/payment/show`"
          class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white"
        >
          Reservation
        </Link>
        <hr>
        <div class="dropdown block mt-5 py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
          <Link class="dropbtn">{{ $page.props.auth.user.name }}</Link>
          <div class="dropdown-content">
              <!-- <Link href="/user/1">Account</Link> -->
              <!-- <Link href="/user/{{ $page.props.auth.user.id }} ">Account</Link> -->
              <Link :href="`/user/${$page.props.auth.user.id}`"  >Account</Link>
              <Link :href="route('logout')" method="post" >Logout</Link>
          </div>
        </div>
      </nav>
    </div>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import ExpandRightMenu from "@/Components/Custom/ExpandRightMenu.vue";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

export default {
  setup() {},
  mounted() {
    // grab everything we need
    const btn = document.querySelector(".mobile-menu-button");
    const sidebar = document.querySelector(".sidebar");

    // add our event listener for the click
    btn.addEventListener("click", () => {
      sidebar.classList.toggle("-translate-x-full");
    });
  },
  components: {
    BreezeApplicationLogo,
    Link,
    ExpandRightMenu,
    Button,
  },
};
</script>

<style scoped>
.dropdown {
  position: relative;
  display: block;
}

.dropdown-content {
  display: none;
  position: absolute;
  left: 240px;
  top: 0px;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block; background-color: white}
.dropdown:hover {
    background-color : blueviolet;
}
</style>
