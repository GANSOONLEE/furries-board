<script setup>
import { reactive, onMounted } from 'vue';
import FrontendAppLayout from '@/Layouts/FrontendAppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';

const maxContentLength = 175;

const state = reactive({
  showMore: false,
  truncatedContent: '',
});

defineProps({
    boards: {
        type: Object
    },
});

// const boards = [
//     {
//         'id': '1',
//         'title': '徵攝友',
//         'content': '您好我想要徵一位攝友您好我想要徵一位攝友您好我想要徵一位攝友您好我想要徵一位攝友您好我想要徵一位攝友',
//         'created_at': '2024-02-24 15:18:23',
//         'updated_at': '2024-02-24 15:18:23'
//     },
//     {
//         'id': '2',
//         'title': '徵攝友',
//         'content': '您好',
//         'created_at': '2024-02-24 15:18:23',
//         'updated_at': '2024-02-24 15:18:23'
//     }
// ];

let timeoutId;

const searchBoard = (event) => {

    clearTimeout(timeoutId);

    // 延遲向伺服器發送 Request，避免每次輸入都會發送
    timeoutId = setTimeout(() => {
        console.log(event.target.value);
    }, 2000);

}

</script>

<template>

    <FrontendAppLayout :page="'您的貼文'">

        <!-- section Table START -->
        <section class="px-8">
            
            <div class="mt-12 shadow w-full rounded-md bg-slate-50 dark:bg-slate-600 p-8">
                
                <!-- div Table Header START -->
                <div class="grid grid-cols-4 justify-center items-center">
                    
                    <div class="col-span-2">
                        <input @input.stop="searchBoard" type="text" class="w-full max-w-142.5 bg-transparent dark:text-white dark:border-slate-400 dark:placeholder:text-white" name="" id="" placeholder="輸入貼文名稱、内容或發佈日期...">
                    </div>

                    <div class="grid grid-cols-2 col-span-2 col-end-7 gap-6">
                        <button class="bg-slate-200 text-black px-4 py-2 rounded hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-800 dark:text-white">
                            批量操作
                        </button>
                        <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">
                            新增貼文
                        </button>
                    </div>

                </div>
                <!-- div Table Header END -->
    
                <!-- table Table Body START -->
                <table class="mt-4 w-full border border-collapse dark:border-slate-500">

                    <thead class="bg-blue-900 text-white">
                        <tr class="space nowrap border-line">
                            <th>id</th>
                            <th>主題</th>
                            <th>内容</th>
                            <th>發佈日期</th>
                            <th>更新日期</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr v-if="boards.data.length > 0" v-for="board in boards.data" class="space border border-line dark:text-white dark:border-slate-500">
                            <td>{{ board.id ?? null }}</td>
                            <td>{{ board.content.length < 30 ? board.content : board.content.slice(0, 24) + '...'}}</td>
                            <td>{{ board.content ?? null }}</td>
                            <td>{{ board.created_at ?? null }}</td>
                            <td>{{ board.updated_at ?? null }}</td>
                        </tr>
                    </tbody>
                    
                </table>
                <!-- table Table Body END -->
    
                <!-- nav Table Footer START -->
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4 border-t dark:border-gray-600" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ boards.from ?? '0' + ' - ' + (boards.to ?? '0') }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ boards.total ?? '0' }}</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a :href="boards.links.slice(0)[0].url" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li v-for="link in boards.links.slice(1, boards.links.length - 1)">
                            <a :href="link.url" aria-current="page" class="flex items-center justify-center text-sm py-2 px-3 leading-tight border border-primary-300" :class="link.active ? 'z-10 text-primary-600 bg-primary-50 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'">{{ link.label }}</a>
                        </li>
                        <li>
                            <a :href="boards.links.slice(-1)[0].url" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- nav Table Footer END -->

            </div>

        </section>
        <!-- section Table END -->

    </FrontendAppLayout>
    
</template>