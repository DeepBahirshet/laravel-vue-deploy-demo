
<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({
    tasks: Array
})

const form = useForm({
    title: ''
})

const submit = () => {
    form.post('/tasks', {
        onSuccess: () => form.reset()
    })
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 p-10">
        <div class="mx-auto max-w-xl rounded-xl bg-white p-8 shadow">

            <h1 class="mb-6 text-2xl font-bold">
                Deploy Demo - Task Manager
            </h1>

            <form @submit.prevent="submit" class="mb-6 flex gap-2">
                <input
                    v-model="form.title"
                    type="text"
                    placeholder="Enter task"
                    class="flex-1 rounded border p-2"
                />

                <button
                    type="submit"
                    class="rounded bg-blue-600 px-4 py-2 text-white"
                    :disabled="form.processing"
                >
                    Add
                </button>
            </form>

            <p v-if="form.errors.title" class="text-red-500">
                {{ form.errors.title }}
            </p>

            <ul class="space-y-3">
                <li
                    v-for="task in tasks"
                    :key="task.id"
                    class="rounded bg-gray-50 p-3"
                >
                    {{ task.title }}
                </li>
            </ul>

        </div>
    </div>
</template>
