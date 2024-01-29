<script setup>
defineProps({
    dropdownItem: Object
});
</script>

<template>
    <li>
        <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-200 ease-in-out hover:text-white" :href="dropdownItem.href">
            {{ dropdownItem.label }}
        </a>
    </li>
</template>