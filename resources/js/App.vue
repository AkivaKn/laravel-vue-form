<template>
    <header v-if="route.path !== '/login'">
        
        <nav class="container text-center p-3 w-100">
<div class="row">

    
    <router-link v-if="route.path !== '/'" to="/" class="btn btn-outline-primary me-2 col"
    >Home</router-link>
    <router-link v-if="route.path !== '/customers/add'" to="/customers/add" class="btn btn-outline-primary me-2 col"
    >New customer</router-link
    >
    <p v-if="store.user" class="col fs-4 m-0 align-self-center">{{ `Hi ${store.user.name}` }}</p>
    <button @click.prevent="logoutUser" class="btn btn-outline-primary col">
        Logout
    </button>
</div>
        </nav>
    </header>
    <router-view v-slot="{ Component, route }" >
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
</template>
<script setup>
import { onMounted } from "vue";
import { store } from "./store";
import { RouterLink, useRoute } from "vue-router";
import router from "./router";

onMounted(() => {
    store.getUser();
});
const logoutUser = async () => {
    const loggedOut = await store.logout();
    if (loggedOut) {
        router.push("/login");
    }
};
const route = useRoute()
</script>
