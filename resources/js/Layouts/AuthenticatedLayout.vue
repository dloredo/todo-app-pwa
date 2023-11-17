<script setup>
import { ref } from "vue";
import Navbar from "./Navbar/Navbar.vue";
import MenuMovil from "./MenuMovil.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="bg-white">
        <Navbar />
        <main>
            <slot />
        </main>
        <MenuMovil />
    </div>
</template>
