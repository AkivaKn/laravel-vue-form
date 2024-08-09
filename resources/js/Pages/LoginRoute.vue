<template>
    <h2 class="text-center m-3">Login</h2>
    <div class="w-75 mx-auto">
        <form @submit.prevent="loginUser">
            <div class="form-floating mb-1">
                <input
                id="email"
                    type="text"
                    v-model="formData.email"
                    class="form-control"
                    :class="{ 'is-invalid': store.loginErrors?.email }"
                />
                <label for="email">Email</label>
            </div>
            <p v-if="store.loginErrors.email" class="text-danger">{{ store.loginErrors.email[0] }}</p>
            <div class="form-floating mb-1">
                <input
                id="password"
                type="password"
                v-model="formData.password"
                class="form-control"
                :class="{ 'is-invalid': store.loginErrors?.password }"

                />
                <label for="password">Password</label>
            </div>
            <p v-if="store.loginErrors.password" class="text-danger">
                {{ store.loginErrors.password[0] }}
            </p>
            <div class="d-grid gap-2">

                <button class="btn btn-success btn-lg">Login</button>
            </div>
        </form>
    </div>
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
    const validFormData = checkForm();
    if (validFormData) {
        const loggedIn = await store.login(formData);
        if (loggedIn) {
            router.push("/");
        }
    }
};
const checkForm = () => {
    const formErrors = {};
    
    if (!formData.email) {
        formErrors.email = ["The email field is required."];
    }
    if (!formData.password) {
        formErrors.password = ["The password field is required."];
    }
    
    if (Object.keys(formErrors).length > 0) {
        store.loginErrors = formErrors;
        return false;
    }
    return true;
};
</script>
