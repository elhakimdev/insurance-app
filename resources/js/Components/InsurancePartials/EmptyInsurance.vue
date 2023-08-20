<script setup>
import {NEmpty, NButton, NCard} from 'naive-ui';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3'
function handleClick(){
  console.log("click");
  route('insurance.create')
}
</script>
<template>
  <NCard class="h-[600px] flex flex-row justify-items-center items-center">
    <NEmpty>
      <template #extra>
        <Link :href="route('insurance.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
          Create New Insurance
        </Link>
      </template>
    </NEmpty>
  </NCard>
</template>