<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Container from "@/Components/Container.vue";

const props = defineProps({
    todos: { type: Object },
});

const form = useForm({
    id: "",
});

const changeStatus = (id) => {
    //console.log("change status");
    form.get(route("changeStatus", id));
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="px-4 mx-auto max-w-8xl xl:px-20 md:px-10 sm:px-2">
            <Container>
                <div
                    class="flex flex-row items-center p-2 rounded-lg shadow-lg cursor-pointer lg:flex-col md:flex-col"
                    v-for="todo in todos"
                    @click="($event) => changeStatus(todo.id)"
                    v-bind:class="
                        todo.status == 0
                            ? 'bg-red-500 text-white'
                            : todo.status == 1
                            ? 'bg-yellow-500 text-black'
                            : todo.status == 2
                            ? 'bg-green-500 text-white'
                            : 'bg-black text-black'
                    "
                    :key="todo.id"
                >
                    <div class="p-2 lg:p-0 md:p-0">
                        <p class="text-lg">{{ todo.title }}</p>
                    </div>
                </div>
            </Container>
        </div>
    </AuthenticatedLayout>
</template>
