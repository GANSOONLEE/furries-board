
<script setup>
import Sidebar from '@/Components/Sidebar.vue'
import Navbar from '@/Components/Navbar.vue'
import { ref } from 'vue';

defineProps({
    title: String
})

let sidebarState = ref(false);
let user = ref({
    name: '默認',
    role: '使用者'
});

const toggleSidebarState = (value) => {
    sidebarState.value = value;
}
</script>

<template>
    <div class="flex">

        <!-- Sidebar -->
        <Sidebar :sidebarState="sidebarState" @toggleSidebarState="toggleSidebarState"/>

        <!-- Content -->
        <div class="w-full">
            <Navbar :sidebarState="sidebarState" :user="user" @toggleSidebarState="toggleSidebarState"/>
            <div class="px-9 py-8 min-h-full dark:bg-gray-900">

                <h1 class="mb-10 text-2xl lg:text-4xl text-black dark:text-bodydark1">{{ title }}</h1>

                <div>
                    <slot></slot>
                </div>

            </div>
        </div>
        
    </div>
</template>
