<template>
    <h1>Add a customer</h1>
    <form @submit.prevent="postCustomer">
        <div>
            <p v-if="errors?.first_name">{{ errors.first_name[0] }}</p>
            <input type="text" placeholder="John" v-model="formData.first_name" />
        </div>
        <div>
            <p v-if="errors?.surname">{{ errors.surname[0] }}</p>

            <input type="text" placeholder="Smith" v-model="formData.surname" />
        </div>
        <div>
            <p v-if="errors?.email">{{ errors.email[0] }}</p>

            <input type="text" placeholder="email" v-model="formData.email" />
        </div>
        <div>
            <p v-if="errors?.phone_number">{{ errors.phone_number[0] }}</p>

            <input type="text" placeholder="phone number" v-model="formData.phone_number" />
        </div>
        <div>
            <p v-if="errors?.address">{{ errors.address[0] }}</p>

            <textarea
                placeholder="address"
                v-model="formData.address"
            ></textarea>
        </div>
        <button>Submit</button>
    </form>
</template>
<script setup>
import { reactive, ref } from "vue";
import router from "../router";
const errors = ref(null)
const formData = reactive({
    first_name: "",
    surname: "",
    email: "",
    phone_number: "",
    address: ""
});
const postCustomer = async () => {

    try {
        const res = await axios.post('/api/customers', formData);
        router.push("/");
    } catch (error) {
        errors.value = error.response.data.errors;
    }
};
</script>
