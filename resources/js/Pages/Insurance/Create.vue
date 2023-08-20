<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateInsuranceForm from "@/Pages/Insurance/Partials/CreateInsuranceForm.vue";
const props = defineProps({
    cars: {
        type: Array,
        required: true
    }
})
</script>
<template>
    <AppLayout title="Team Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Insurance List Form
            </h2>
        </template>

        <div class="py-12 flex w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex w-full items-center">
              <CreateInsuranceForm />
            </div>
            <!-- <Welcome /> -->
        </div>
    </AppLayout>
</template>