<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EmptyInsurance from "@/Components/InsurancePartials/EmptyInsurance.vue"
</script>
<template>
    <AppLayout title="Team Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Insurance List
            </h2>
        </template>

        <div class="py-12 flex w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex w-full items-center">
                <EmptyInsurance />
            </div>
            <!-- <Welcome /> -->
        </div>
    </AppLayout>
</template>
