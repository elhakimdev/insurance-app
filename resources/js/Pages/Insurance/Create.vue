<script setup>
import {computed, ref, watch} from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateInsuranceForm from "@/Pages/Insurance/Partials/CreateInsuranceForm.vue";
const props = defineProps({
    cars: {
        type: Array,
        required: true
    },
    colors: {
        type: Array,
        required: true
    }
})

const carOptions = computed(() => {
    return props.cars.map((car, index) => {
        return {
            key: car.name,
            text: car.name,
            value: car.id
        }
    })
})

const selectedCar = ref(null);
const selectedCarSeries = ref(null);

const carSeriesOptionsRaw_ = computed(() => {
    return props.cars.map((car, index) => {
        return {
            carId: car.id,
            series: car.series
        }
    })
})

const carSeriesOptions = ref(null);
const colorOptions = computed(() => {
    return props.colors.map((color, index) => {
        return {
            key: color.name,
            text: color.name,
            value: color.id
        }
    })
})

watch(() => selectedCar.value, (n) => {
    if(n){
        const series = carSeriesOptionsRaw_.value.filter(({carId}) => carId === n.value)[0].series;
        const seriesMapping = series.map((e) => {
            return {
                key: e.name,
                text: e.name,
                value: e.id
            }
        })
        carSeriesOptions.value = [...seriesMapping];
    } else {
        carSeriesOptions.value = null
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
              <CreateInsuranceForm 
                :carOptions="carOptions"
                :carSeriesOptions="carSeriesOptions"
                :colorOptions="colorOptions"
                v-model:selectedCar="selectedCar"
                v-model:selectedCarSeries="selectedCarSeries"
              />
            </div>
            <!-- <Welcome /> -->
        </div>
    </AppLayout>
</template>