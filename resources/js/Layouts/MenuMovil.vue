<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <nav
        class="fixed bottom-0 flex items-center justify-between w-full px-4 text-center text-gray-600 bg-white md:hidden"
    >
        <div class="items-center p-2">
            <Link :href="route('dashboard')" type="button">
                <i class="text-xl ri-search-line"></i>
                <p class="text-xs text-gray-500">Tareas</p>
            </Link>
        </div>
        <div class="items-center p-2">
            <Link :href="route('finalizadas')" type="button">
                <i class="text-2xl ri-heart-3-line"></i>
                <p class="text-xs text-gray-500">Finalizadas</p>
            </Link>
        </div>

        <div class="items-center p-2">
            <Link :href="route('profile.edit')" type="button">
                <i class="text-2xl ri-user-line"></i>
                <p class="text-xs text-gray-500">Perfil</p>
            </Link>
        </div>
    </nav>
</template>
