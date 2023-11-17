<script lang="ts">
import { ref } from "vue";

export default {
    components: {},
    setup() {
        let showMenu = ref(false);
        const toggleOpen = () => {
            showMenu.value = !showMenu.value;
            console.log(showMenu.value);
        };
        return {
            toggleOpen,
            showMenu,
        };
    },
};
</script>

<template>
    <div class="relative">
        <div class="flex flex-row items-center gap-3">
            <div
                class="hidden px-4 py-3 text-sm font-semibold transition rounded-lg cursor-pointer md:block hover:bg-neutral-100"
            >
                Unete
            </div>
            <div
                @click="toggleOpen()"
                class="hidden p-2 md:py-1 md:px-2 border-[1px] border-neutral-200 md:flex md:flex-row items-center gap-3 rounded-lg cursor-pointer hover:shadow-md transition"
            >
                <i class="ri-menu-line"></i>
                <div class="hidden md:block">
                    <img
                        src="../../../../public/photos/placeholder.jpg"
                        alt="Avatar"
                        class="rounded-full"
                        height="30"
                        width="30"
                    />
                </div>
            </div>
        </div>
        <div
            v-if="showMenu == true"
            class="absolute rounded-lg shadow-sm w-[40vw] md:w-3/4 bg-white overflow-hidden right-0 top-12 text-sm"
        >
            <div class="flex flex-col cursor-pointer">
                <div
                    class="px-4 py-3 font-semibold transition hover:bg-neutral-100"
                >
                    Login
                </div>
                <hr />
                <div
                    class="px-4 py-3 font-semibold transition hover:bg-neutral-100"
                >
                    Ayuda
                </div>
            </div>
        </div>
    </div>
</template>
