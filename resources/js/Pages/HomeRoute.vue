<template>
    <div>
        <h1>Customers</h1>
        <p v-if="store.user">{{ `Hi ${store.user.name}`}}</p>
        <ul>
            <li v-if="response" v-for="customer in response.data">
                <h3>{{ `${customer.first_name} ${customer.surname}` }}</h3>
                <p>{{ customer.email }}</p>
                <p>{{ customer.phone_number }}</p>
                <p>{{ customer.address }}</p>
            </li>
        </ul>
        <router-link to="/login">Login</router-link>
    </div>
</template>
<script setup>
import axios from "axios";
import { ref } from "vue";
import { store } from "../store";
const response = ref(null);
const getCustomers = async () => {
    try {
        response.value = await axios.get("/api/customers");
    } catch (error) {
        console.log(error);
    }
};
getCustomers();
</script>
