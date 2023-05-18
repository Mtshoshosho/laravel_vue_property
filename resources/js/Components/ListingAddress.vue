<script setup>
defineProps({
  listing: Object,
})
</script>

<template>
  <div>
    {{ listing.postal_code }}
    {{ listing.prefecture }}
    {{ listing.city }}
    {{ listing.address1 }}
    {{ listing.property_name }}
  </div>
</template>