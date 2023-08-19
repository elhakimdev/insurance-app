<script setup>
import {NEmpty, NButton, NCard} from 'naive-ui';
</script>
<template>
  <NCard class="h-[600px] flex flex-row justify-items-center items-center">
    <NEmpty>
      <template #extra>
        <NButton size="small" type="info" ghost>
          Create New Insurance
        </NButton>
      </template>
    </NEmpty>
  </NCard>
</template>