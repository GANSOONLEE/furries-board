<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import BackendAppLayout from '@/Layouts/AdminBackendAppLayout.vue';

const searchTerm = ref(null);

const form = useForm({
    searchTerm: '',
});

const searchUser = () => {
    // form.put(route('user-password.update'), {
    //     errorBag: 'searchUser',
    //     preserveScroll: true,
    //     onSuccess: () => form.reset(),
    //     onError: () => {
    //         if (form.errors.searchTerm) {
    //             form.reset('password', 'password_confirmation');
    //             searchTermInput.value.focus();
    //         }
    //     },
    // });
};

const props = defineProps({
    users: {
        type: Object
    },
});
</script>

<template>
    <BackendAppLayout :title="'使用者管理'">

        <Head title="User Management" />

        <div class="w-full">
            <div class="px-5 py-4 shadow-2 rounded-md bg-white dark:bg-gray-800">
                <!-- TABLE HEADER Start -->
                <div class="flex flex-col items-start gap-y-6 lg:flex-row lg:justify-between lg:items-center mb-5">

                    <h3 class="text-xl dark:text-white">使用者</h3>

                    <!-- SEARCH BAR Start-->
                    <form @submit="searchUser" class="w-full lg:w-[30%]">
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
                    <div class="flex justify-between w-full lg:w-auto lg:justify-start gap-x-12">
                        <div class="flex items-center gap-x-4">
                            <label class="whitespace-nowrap" for="status">狀態:</label>
                            <select class="rounded-sm border-none bg-gray-50 dark:bg-gray-700 dark:text-white" name="status"
                                id="status">
                                <option value="">所有</option>
                                <option value="">活躍</option>
                                <option value="">不活躍</option>
                            </select>
                        </div>
                        <!-- <div class="flex items-center gap-x-4">
                            <label class="whitespace-nowrap" for="signedUp">上次登入時間:</label>
                            <select class="rounded-sm border-none bg-gray-50 dark:bg-gray-700 dark:text-white"
                                name="signedUp" id="signedUp">
                                <option value="">所有</option>
                                <option value="">2 周</option>
                                <option value="">1 月</option>
                                <option value="">3 月</option>
                            </select>
                        </div> -->
                    </div>
                    <!-- FITLER End-->
                </div>
                <!-- TABLE HEADER End -->

                <!-- TABLE BODY Start -->
                <div class="overflow-x-auto mb-3">
                    <table class="min-w-[41.5rem] w-full p-1">
                        <thead>
                            <tr class="text-black bg-gray-50 dark:text-white dark:bg-gray-500">
                                <th class="text-start px-4 py-3">ID</th>
                                <th class="text-start">名稱</th>
                                <th class="text-start">電子郵件</th>
                                <th class="text-start">狀態</th>
                                <!-- <th class="text-start">距上次登入</th> -->
                                <th class="text-start">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users.data" class="text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <td class="px-4 py-3">{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.active ? '活躍' : '不活躍' }}</td>
                                <!-- <td>{{ user.signUp }}</td> -->
                                <td>
                                    <a @click.prevent="" class="cursor-pointer hover:underline hover:text-primary dark:hover:text-bodydark">管理</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- TABLE BODY End -->

                <!-- TABLE FOOTER Start -->
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4 border-t dark:border-gray-600" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ users.from + ' - ' + users.to }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ users.total }}</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a :href="users.links.slice(0)[0].url" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li v-for="link in users.links.slice(1, users.links.length - 1)">
                            <a :href="link.url" aria-current="page" class="flex items-center justify-center text-sm py-2 px-3 leading-tight border border-primary-300" :class="link.active ? 'z-10 text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'">{{ link.label }}</a>
                        </li>
                        <li>
                            <a :href="users.links.slice(-1)[0].url" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- TABLE FOOTER End -->
                
            </div>
        </div>
    </BackendAppLayout>
</template>
