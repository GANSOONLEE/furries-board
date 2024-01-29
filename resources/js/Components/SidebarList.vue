
<script setup>
import { ref } from 'vue';

const selected = ref(null);
const toggleSelected = (label) => {
  selected.value = selected.value === label ? '' : label;
};

defineProps({
    hasDropdownItem: Boolean,
    icon: String,
    href: String,
    label: String,
});
</script>

<template>
    <li>
        <a class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydarker dark:hover:bg-meta-4"
        href="#" @click.prevent="toggleSelected(label)"
        >
            <img :src="icon" alt="" aria-label="icon">
            {{ label }}
            <img v-if="hasDropdownItem" class="ml-auto" src="/img/icon/arrow.svg" alt="" :class="{'rotate-180' : (selected === label)}">
        </a>

        <!-- Dropdown Menu Start -->
        <div v-if="hasDropdownItem" class="overflow-hidden" :class="(selected === label) ? 'block' : 'hidden'">
            <ul class="mt-4 mb-3 flex flex-col gap-3.5 pl-6">
                <slot></slot>
            </ul>
        </div>
        <!-- Dropdown Menu End -->

    </li>
</template>