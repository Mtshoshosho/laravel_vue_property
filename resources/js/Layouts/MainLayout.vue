<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
  <Link href="/">Index Page</Link>
  <Link href="/hello">Show Page</Link>
  <slot>Default</slot>
</template>
