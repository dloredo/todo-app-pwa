<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Container from "@/Components/Container.vue";
import Modal from "@/Components/Modal.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";
const modal = ref(false);
const title = ref("");

const props = defineProps({
    todos: { type: Object },
    todos1: { type: Object },
});

const form = useForm({
    id: "",
    title: "",
});

const changeStatus = (id) => {
    //console.log("change status");
    form.get(route("changeStatus", id));
};

const openModal = () => {
    modal.value = true;
    title.value = "Crear tarea";
};

const closeModal = () => {
    modal.value = false;
    form.reset();
};

const ok = () => {
    form.reset();
    closeModal();
};

const save = () => {
    form.post(route("todoStore"), {
        onSuccess: () => {
            ok();
        },
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="px-4 mx-auto max-w-8xl xl:px-20 md:px-10 sm:px-2">
            <Container
                ><div class="flex flex-row justify-end w-full">
                    <span
                        @click="openModal()"
                        href=""
                        class="p-2 bg-green-500 rounded-lg"
                        type="button"
                    >
                        Agregar tarea
                    </span>
                </div>
                <p v-if="todos.length != 0">Tareas pendientes</p>
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
                    <div class="flex w-full p-2 lg:p-0 md:p-0">
                        <p class="text-lg">{{ todo.title }}</p>
                    </div>
                </div>
                <p v-if="todos1.length != 0">Tareas en proceso</p>
                <div
                    class="flex flex-row items-center p-2 rounded-lg shadow-lg cursor-pointer lg:flex-col md:flex-col"
                    v-for="todo1 in todos1"
                    @click="($event) => changeStatus(todo1.id)"
                    v-bind:class="
                        todo1.status == 0
                            ? 'bg-red-500 text-white'
                            : todo1.status == 1
                            ? 'bg-yellow-500 text-black'
                            : todo1.status == 2
                            ? 'bg-green-500 text-white'
                            : 'bg-black text-black'
                    "
                    :key="todo1.id"
                >
                    <div class="p-2 lg:p-0 md:p-0">
                        <p class="text-lg">{{ todo1.title }}</p>
                    </div>
                </div>
                <a v-if="todos.length === 0 && todos1.length === 0">
                    No hay tareas por mostrar.
                </a>
            </Container>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font-bold text-gray-900">{{ title }}</h2>

            <div class="p-3">
                <InputLabel for="title" value="Tarea:" class=""></InputLabel>
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="Desayunar huevos cocidos"
                ></TextInput>
                <InputError
                    :message="form.errors.title"
                    class="mt-2"
                ></InputError>
            </div>
            <div class="flex justify-end p-3 mt-6">
                <PrimaryButton :disabled="form.processing" @click="save">
                    <i class="fa-solid fa-save"></i> Guardar
                </PrimaryButton>
                <SecondaryButton
                    class="ml-3"
                    :disabled="form.processing"
                    @click="closeModal"
                >
                    Cancelar
                </SecondaryButton>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
