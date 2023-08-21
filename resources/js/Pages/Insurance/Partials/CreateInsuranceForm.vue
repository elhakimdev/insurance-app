<script setup>
import { ref, computed, watch } from 'vue'
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Select from '@/Components/Select.vue';
import {NDatePicker} from "naive-ui";
const form = useForm('createNewInsurance',{
  _method: "POST",
  case: null,
  car: null,
  series: null,
  millage: null,
  buyingDate: null,
  color: null,
  driveTrain: null,
  image: null
})

const props = defineProps([
  'carOptions', 
  'carSeriesOptions', 
  'colorOptions', 
  'selectedCar', 
  'selectedCarSeries'
]);
const emits = defineEmits([
  "update:selectedCar", 
  "update:selectedCarSeries",
  "update:selectedColor"
]);
const selectedCar = ref(null);
const selectedCarSeries = ref(null);
const selectedColor = ref(null);
const carOptions = computed(() => props.carOptions);
const carSeriesOptions = computed(() => props.carSeriesOptions);
const colorOptions = computed(() => props.colorOptions);

watch(() => selectedCar.value, (n) => {
  if(n){
    emits("update:selectedCar", n)
  }
})
watch(() => selectedCarSeries.value, (n) => {
  if(n){
    emits("update:selectedCarSeries", n)
  }
})
watch(() => selectedColor.value, (n) => {
  if(n){
    emits("update:selectedColor", n)
  }
})

const driveTrainOptions_ = ref([
  {
    key: "2x4",
    text: "2x4",
    value: "2x4"
  },
  {
    key: "4x4",
    text: "4x4",
    value: "4x4"
  }
])

const selectedDriveTrain = ref(null);
</script>
<template>
  <div class="w-full max-w-full px-2 py-16 sm:px-0">
    <TabGroup>
      <TabList class="flex w-full space-x-1 rounded-xl bg-blue-900/20 p-1">
        <Tab v-slot="{ selected }" as="template">
          <button
            :class="[
              'w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-blue-700',
              'ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
              selected
                ? 'bg-white shadow'
                : 'text-blue-100 hover:bg-white/[0.12] hover:text-white',
            ]"
          >
            Step 1
          </button>
        </Tab>
        <Tab v-slot="{ selected }" as="template">
          <button
            :class="[
              'w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-blue-700',
              'ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
              selected
                ? 'bg-white shadow'
                : 'text-blue-100 hover:bg-white/[0.12] hover:text-white',
            ]"
          >
            Step 2
          </button>
        </Tab>
      </TabList>
      <TabPanels class="mt-2">
        <TabPanel 
          :class="[
            'rounded-xl bg-white p-6',
            'ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
          ]">

          <!-- case -->
          <div class="col-span-6 sm:col-span-4 mt-3">
            <InputLabel for="case" value="Please enter an insurance case" />
            <TextInput
              id="case"
              v-model="form.case"
              type="text"
              class="mt-1 block w-full"
              required
              autocomplete="case"
            />
            <InputError :message="form.errors.case" class="mt-2" />
          </div>

          <!-- Select Car -->
          <div class="col-span-6 sm:col-span-4 mt-3">
            <InputLabel for="case" value="Please enter car" />
            <Select 
              v-model="form.car" 
              :options="carOptions" 
              v-model:selectedOption="selectedCar"
            />
            <InputError :message="form.errors.car" class="mt-2" />
          </div>

          <!-- Select Car -->
          <div class="col-span-6 sm:col-span-4 mt-3">
            <InputLabel for="case" value="Please enter car series" />
            <Select 
              v-model="form.series" 
              :options="carSeriesOptions" 
              v-model:selectedOption="selectedCarSeries"
            />
            <InputError :message="form.errors.series" class="mt-2" />
          </div>

          <!-- Millage -->
          <div class="col-span-6 sm:col-span-4 mt-3">
            <InputLabel for="millage" value="Please enter millage" />
            <TextInput
              id="millage"
              v-model="form.millage"
              type="number"
              class="mt-1 block w-full"
              required
              autocomplete="millage"
            />
            <InputError :message="form.errors.millage" class="mt-2" />
          </div>

          <!-- Buying Date -->
          <div class="col-span-6 sm:col-span-4 mt-3">
            <InputLabel for="buying_date" value="Please enter buying date" />
            <NDatePicker 
              id="buying_date"
              v-model="form.buyingDate"
              type="date"
            />
            <InputError :message="form.errors.buyingDate" class="mt-2" />
          </div>

        </TabPanel>
        <TabPanel 
          :class="[
            'rounded-xl bg-white p-3',
            'ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
          ]">
          <!-- Select Color -->
          <div class="col-span-6 sm:col-span-4 mt-3">
            <InputLabel for="color" value="Please enter color" />
            <Select 
              v-model="form.color" 
              :options="colorOptions" 
              v-model:selectedOption="selectedColor"
            />
            <InputError :message="form.errors.color" class="mt-2" />
          </div>
          <!-- Select Drive Train only If user chose grand choke -->
          <div class="col-span-6 sm:col-span-4 mt-3" v-if="selectedCarSeries.text  === 'Grand Cherokee'">
            <InputLabel for="drive train" value="Please enter drive train" />
            <Select 
              v-model="form.driveTrain" 
              :options="driveTrainOptions_" 
              v-model:selectedOption="selectedDriveTrain"
            />
            <InputError :message="form.errors.color" class="mt-2" />
          </div>
        </TabPanel>
      </TabPanels>
    </TabGroup>
  </div>
</template>
