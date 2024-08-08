<template>
    <h2 class="text-center mb-3">Customers</h2>

    <div class="d-none d-md-block">
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
                    <td>
                        <p class="m-0">{{ customer.first_line }}</p>
                        <p class="m-0">{{ customer.second_line }}</p>
                        <p class="m-0">{{ customer.city }}</p>
                        <p class="m-0">{{ customer.postcode }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="list-group d-md-none">
        <div
            class="card list-group-item m-3"
            v-if="response"
            v-for="customer in response.data"
        >
            <div class="card-body">
                <h5 class="card-title">
                    {{ `${customer.first_name} ${customer.surname}` }}
                </h5>
                <h6 class="card-subtitle my-2 text-body-secondary">
                    {{ customer.email }}
                </h6>
                <p class="card-text my-2">{{ customer.phone_number }}</p>
                <p class="card-text m-0">{{ customer.first_line }}</p>
                <p class="card-text m-0">{{ customer.second_line }}</p>
                <p class="card-text m-0">{{ customer.city }}</p>
                <p class="card-text m-0">{{ customer.postcode }}</p>
            </div>
        </div>
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
