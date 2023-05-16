<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import {ref} from 'vue';

// refを使用して、Vue3のリアクティブな変数を作成
const timer = ref(0);
// リアクティブな変数の値を変更する関数を作成
setInterval(() => timer.value++, 1000)
</script>

<template>
  <Link href="/">Index Page</Link>
  <Link href="/hello">Show Page</Link>
  <div>The page with time {{ timer }}</div>
  <slot>Default</slot>
</template>
