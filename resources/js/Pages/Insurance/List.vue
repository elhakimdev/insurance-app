<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EmptyInsurance from "@/Components/InsurancePartials/EmptyInsurance.vue";
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <AppLayout title="Team Settings">
        <template #header>
            <div class="flex w-full justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Insurance List
                </h2>
                <Link :href="route('insurance.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Create New Insurance
                </Link>
            </div>
        </template>

        <div class="py-12 flex w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex w-full items-center">
                <EmptyInsurance />
            </div>
        </div>
    </AppLayout>
</template>
