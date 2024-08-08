<template>
    <h1>Login</h1>
    <form @submit.prevent="loginUser">
        <div>
            <p v-if="store.loginError.email">{{ store.loginError.email[0] }}</p>
            <input type="text" placeholder="email" v-model="formData.email" />
        </div>
        <div>
            <p v-if="store.loginError.password">
                {{ store.loginError.password[0] }}
            </p>
            <input
                type="password"
                placeholder="password"
                v-model="formData.password"
            />
        </div>
        <button>Login</button>
    </form>
</template>
<script setup>
import { reactive } from "vue";
import { store } from "../store";
import router from "../router";

const formData = reactive({
    email: "",
    password: "",
});
const loginUser = async () => {
    const loggedIn = await store.login(formData);
    if (loggedIn) {
        router.push("/");
    }
};
</script>
