<script setup>
import { ref } from 'vue'
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
const form = useForm({
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

const carOptions = ref([
  {
    key: "bmw",
    text: "bmw",
    value: 1
  },
  {
    key: "mercedes",
    text: "mercedes",
    value: 2
  },
  {
    key: "jeep",
    text: "jeep",
    value: 3
  },
])
const selectedCar = ref(null);
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
          <div class="col-span-6 sm:col-span-4">
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
          <!-- case -->
          <div class="col-span-6 sm:col-span-4">
            <InputLabel for="case" value="Please enter an insurance case" />
            <!-- <TextInput
              id="case"
              v-model="form.car"
              type="text"
              class="mt-1 block w-full"
              required
              autocomplete="case"
            /> -->
            <Select v-model="form.car" :options="carOptions" v-model:selectedOptions="selectedCar"/>
            <InputError :message="form.errors.car" class="mt-2" />
          </div>

        </TabPanel>
        <TabPanel 
          :class="[
            'rounded-xl bg-white p-3',
            'ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
          ]">
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil veritatis eos repellat exercitationem, quae ab laboriosam. Vero, officiis quia. Velit nesciunt accusamus alias unde! Eligendi, blanditiis vitae! Non, nemo libero?
        </TabPanel>
      </TabPanels>
    </TabGroup>
  </div>
</template>
