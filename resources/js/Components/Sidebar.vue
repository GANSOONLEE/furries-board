
<script setup>

import SidebarList from '@/Components/SidebarList.vue';
import SidebarListDropdown from '@/Components/SidebarListDropdown.vue';

const props = defineProps({
    sidebarState: Boolean
});
const emit = defineEmits();

const closeSidebar = () => {
    emit('toggleSidebarState', false);
};
</script>

<template>

  <div class="relative top-0 w-min">

    <aside :class="sidebarState ? 'translate-x-0' : '-translate-x-full'"
      class="fixed left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
      ref="sidebar">

      <!-- SIDEBAR HEADER -->
      <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <!-- HOME -->
        <a href="/">標志</a>

        <!-- CLOSE BUTTON -->
        <button class="flex justify-center items-center p-2 hover:rounded-full hover:bg-gray-600 lg:hidden" @click.stop="closeSidebar">
          <img src="/img/icon/xmark.svg" alt="icon">
        </button>
      </div>
      <!-- SIDEBAR HEADER -->

      <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 py-4 px-4 lg:mt-9 lg:px-6">

          <!-- System Group -->
          <div>
            <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">系統</h3>
            <ul class="mb-6 flex flex-col gap-1.5">

              <SidebarList :hasDropdownItem="true" :href="'#'" :label="'使用者與身份管理'" :icon="'/img/icon/dashboard.svg'">

                <SidebarListDropdown :dropdownItem="{href:'#', label:'使用者管理'}"/>
                <SidebarListDropdown :dropdownItem="{href:'#', label:'身份管理'}"/>

              </SidebarList>

              <SidebarList :dropdownToggle="false" :href="'#'" :label="'公告管理'" :icon="'/img/icon/notification.svg'" />

              <SidebarList :dropdownToggle="false" :href="'#'" :label="'社群管理'" :icon="'/img/icon/social.svg'" />

              <SidebarList :dropdownToggle="false" :href="'#'" :label="'Logs'" :icon="'/img/icon/logs.svg'" />

            </ul>
          </div>

        </nav>
      </div>
    </aside>
  </div>

</template>
