<template>
     <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
</template>
<script setup>
import { onMounted } from 'vue';
import { store } from './store';

onMounted(() => {
    store.getUser()
})
</script>