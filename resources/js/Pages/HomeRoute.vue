<template>
    <div>
        <h1>Customers</h1>
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
