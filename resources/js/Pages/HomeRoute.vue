<template>
    <div>
        <h2 class="text-center mb-3">Customers</h2>

            
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="response" v-for="customer in response.data">
                    <th>{{ `${customer.first_name} ${customer.surname}` }}</th>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone_number }}</td>
                    <td>{{ customer.address }}</td>
                </tr>
            </tbody>
            <!-- <div
                class="card list-group-item"
                v-if="response"
                v-for="customer in response.data"
            >
                <div class="card-body">
                    <h5 class="card-title">
                        {{ `${customer.first_name} ${customer.surname}` }}
                    </h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">
                        {{ customer.email }}
                    </h6>
                    <p class="card-text">{{ customer.phone_number }}</p>
                    <p class="card-text">{{ customer.address }}</p>
                </div>
            </div> -->
        </table>
    </div>
</template>
<script setup>
import axios from "axios";
import {  ref } from "vue";
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
