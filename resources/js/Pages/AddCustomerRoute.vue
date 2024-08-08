<template>
    <h2 class="text-center mb-3">New customer</h2>
    <div class="w-75 mx-auto">
    <form @submit.prevent="postCustomer">
        <div class="form-floating mb-1">
            <input
            id="first_name"
            type="text"
            placeholder="John"
            v-model="formData.first_name"
            class="form-control"
            :class="{'is-invalid':errors?.first_name}"
            
            />
            <label for="first_name">First Name</label>
        </div>
        <p v-if="errors?.first_name" class="text-danger">{{ errors.first_name[0] }}</p>
        <div class="form-floating mb-1">
            
            <input
            type="text"
            placeholder="Smith"
            v-model="formData.surname"
            id="surname"
            class="form-control"
            :class="{'is-invalid':errors?.surname}"
            />
            <label for="surname">Surname</label>
        </div>
        <p v-if="errors?.surname"  class="text-danger">{{ errors.surname[0] }}</p>
        <div class="form-floating mb-1">
            
            <input
            type="text"
            placeholder="email"
            v-model="formData.email"
            id="email"
            class="form-control"
            :class="{'is-invalid':errors?.email}"
            />
            <label for="email">Email</label>
        </div>
        <p v-if="errors?.email" class="text-danger">{{ errors.email[0] }}</p>
        <div class="form-floating mb-1">
            
            <input
            type="text"
            placeholder="phone number"
            v-model="formData.phone_number"
            id="phone_number"
            class="form-control"
            :class="{'is-invalid':errors?.phone_number}"
            />
            <label for="phone_number">Phone Number</label>
        </div>
        <p v-if="errors?.phone_number" class="text-danger">{{ errors.phone_number[0] }}</p>
        <div class="form-floating mb-1">
            
            <textarea
            placeholder="address"
            v-model="formData.address"
            id="address"
            class="form-control"
            :class="{'is-invalid':errors?.address}"
            style="height: 130px"
            ></textarea>
            <label for="address">Address</label>
        </div>
        <p v-if="errors?.address" class="text-danger">{{ errors.address[0] }}</p>
        <div class="d-grid gap-2">

            <button class="btn btn-success btn-lg">Submit</button>
        </div>
    </form>
</div>
</template>
<script setup>
import { reactive, ref } from "vue";
import router from "../router";
const errors = ref(null);
const formData = reactive({
    first_name: "",
    surname: "",
    email: "",
    phone_number: "",
    address: "",
});
const postCustomer = async () => {
    try {
        const res = await axios.post("/api/customers", formData);
        router.push("/");
    } catch (error) {
        errors.value = error.response.data.errors;
    }
};

</script>
