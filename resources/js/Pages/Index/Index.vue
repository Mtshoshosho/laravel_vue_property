<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import MainLayout from '../../Layouts/MainLayout.vue';
// コンポーネントにプロパティが存在することを定義
defineProps({
    message: String,
});
</script>

<template>
  <MainLayout>
    <div>Index</div>
  <Link href="/hello">Show Page</Link>
    <div>
      <!-- プロパティを表示 -->
        The message is: {{ message }}
    </div>
  </MainLayout>
</template>