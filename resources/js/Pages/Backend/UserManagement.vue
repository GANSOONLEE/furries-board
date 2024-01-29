<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import BackendAppLayout from '@/Layouts/BackendAppLayout.vue';

const searchTerm = ref(null);
const users = ref([
    {
        id: 1,
        name: 'Gan Soon Lee',
        email: 'vincentgan0402@gmail.com',
        status: 'Active',
        signUp: '2024/01/01',
    },
    {
        id: 2,
        name: 'Kai Tai Zeng',
        email: 'admin@admin.com',
        status: 'inactive',
        signUp: '2024/01/01',
    },
])

const form = useForm({
    searchTerm: '',
});

const searchUser = () => {
    form.put(route('user-password.update'), {
        errorBag: 'searchUser',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.searchTerm) {
                form.reset('password', 'password_confirmation');
                searchTermInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <BackendAppLayout :title="'User Management'">

        <Head title="User Management" />

        <div class="w-full">
            <div class="px-5 py-4 shadow-2 rounded-md bg-white dark:bg-gray-800">
                <!-- TABLE HEADER Start -->
                <div class="flex justify-between items-center mb-5">

                    <h3 class="text-xl dark:text-white">User</h3>

                    <!-- SEARCH BAR Start-->
                    <form @submit="searchUser" class="w-[30%]">
                        <div class="relative flex items-center gap-x-4">
                            <i class="flex justify-center items-center absolute left-3">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                        stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-black dark:stroke-white"/>
                                </svg>
                            </i>
                            <input
                                class="block pl-10 w-full rounded-sm border-none bg-gray-50 dark:bg-gray-700 dark:text-white placeholder:dark:text-gray-400"
                                type="text" name="searchTerm" id="searchTerm" placeholder="Search user, email...">
                        </div>
                    </form>
                    <!-- SEARCH BAR End-->

                    <!-- FITLER Start-->
                    <div class="flex gap-x-12">
                        <div class="flex items-center gap-x-4">
                            <label class="whitespace-nowrap" for="status">Status:</label>
                            <select class="rounded-sm border-none bg-gray-50 dark:bg-gray-700 dark:text-white" name="status"
                                id="status">
                                <option value="">All</option>
                                <option value="">Active</option>
                                <option value="">Ban</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <label class="whitespace-nowrap" for="signedUp">Signed up:</label>
                            <select class="rounded-sm border-none bg-gray-50 dark:bg-gray-700 dark:text-white"
                                name="signedUp" id="signedUp">
                                <option value="">All</option>
                                <option value="">2 Week</option>
                                <option value="">1 Month</option>
                                <option value="">3 Month</option>
                            </select>
                        </div>
                    </div>
                    <!-- FITLER End-->
                </div>
                <!-- TABLE HEADER End -->

                <!-- TABLE BODY Start -->
                <table class="w-full">
                    <thead>
                        <tr class="text-black bg-gray-50 dark:text-white dark:bg-gray-500">
                            <th class="text-start px-4 py-3">ID</th>
                            <th class="text-start">NAME</th>
                            <th class="text-start">EMAIL</th>
                            <th class="text-start">STATUS</th>
                            <th class="text-start">SIGN UP</th>
                            <th class="text-start">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" class="text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.status }}</td>
                            <td>{{ user.signUp }}</td>
                            <td>
                                <a @click.prevent="" class="cursor-pointer hover:underline hover:text-primary dark:hover:text-bodydark">管理</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- TABLE BODY End -->
            </div>
        </div>
    </BackendAppLayout>
</template>

<style></style>
