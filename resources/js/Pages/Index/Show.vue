<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
  <div>Show</div>
  <Link href="/">Index Page</Link>
</template>

<script>
import MainLayout from "../../Layouts/MainLayout.vue";

export default {
    layout: MainLayout,
};
</script>