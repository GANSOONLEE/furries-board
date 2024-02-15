<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="您的貼文">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                您的貼文
            </h2>
        </template>

        <section class="flex justify-center items-start bg-gray-50 dark:bg-gray-900 mt-8">
           
            <div class="grid grid-cols-3 gap-12 place-content-center p-4">

                <div class="bg-white px-6 py-4 w-auto">
                    <p class="text-2xl text-black">我是其中一個卡片哦</p>
                </div>

            </div>

        </section>

    
    </AppLayout>
</template>
