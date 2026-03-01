<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
defineProps<{
  links: {
    url: string | null
    label: string
    active: boolean
  }[]
}>()
</script>

<template>
  <div class="flex justify-center gap-1">
    <Link
      v-for="link in links"
      :key="link.label"
      :href="link.url ?? ''"
      v-html="link.label"
      class="px-3 py-1 text-sm rounded-md border transition"
      :class="[
        link.active
          ? 'bg-primary text-white'
          : 'hover:bg-gray-100',
        !link.url && 'pointer-events-none opacity-50'
      ]"
    />
  </div>
</template>