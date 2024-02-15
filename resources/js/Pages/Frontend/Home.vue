<script setup>
import { reactive, onMounted, ref } from 'vue';
import FrontendAppLayout from '@/Layouts/FrontendAppLayout.vue';

const maxContentLength = 175;

const state = reactive({
  showMore: false,
  truncatedContent: '',
});

defineProps({
    boards: Array
})

onMounted(() => {
    props.boards.forEach((board) => {
    const content = board.content;
    const elementId = `content-${board.id}`;
    const element = document.getElementById(elementId);

    if (element) {
        state.showMore = content.length < maxContentLength;
        if (!state.showMore) {
            state.truncatedContent = content.slice(0, maxContentLength) + ' ......';
        }
    }
    });
});

</script>

<template>

    <FrontendAppLayout :page="'Welcome'">

        <div class="flex flex-col justify-start items-center gap-y-8 mt-12">

            <div v-for="board in boards" class="p-8 rounded border shadow hover:shadow-md bg-gray-100 dark:bg-gray-700 dark:shadow-gray-800 dark:border-gray-700 max-w-[75%] sm:max-w-[36rem]" >
                <p class="text-2xl whitespace-normal w-full text-black dark:text-white font-bold mb-6">{{ board.title }}</p> <!-- title -->

                <div class="text-base text-gray-600 dark:text-gray-300 mb-1" :id="'content-' + board.id">
                    <div v-if="!state.showMore" v-html="state.truncatedContent"></div>
                    <div v-else v-html="board.content"></div>
                </div>
                <a v-if="!state.showMore" href="#" class="text-blue-500">查看更多</a>
            </div>

        </div>

    </FrontendAppLayout>
    
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
