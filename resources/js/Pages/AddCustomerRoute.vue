<template>
    <h2 class="text-center mb-3">New customer</h2>
    <div class="w-75 mx-auto">
        <form @submit.prevent="postCustomer" novalidate>
            <div class="form-floating mb-1">
                <input
                    id="first_name"
                    type="text"
                    v-model="formData.first_name"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.first_name }"
                />
                <label for="first_name">First Name</label>
            </div>
            <p v-if="errors?.first_name" class="text-danger">
                {{ errors.first_name[0] }}
            </p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.surname"
                    id="surname"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.surname }"
                />
                <label for="surname">Surname</label>
            </div>
            <p v-if="errors?.surname" class="text-danger">
                {{ errors.surname[0] }}
            </p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.email"
                    id="email"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.email }"
                />
                <label for="email">Email</label>
            </div>
            <p v-if="errors?.email" class="text-danger">
                {{ errors.email[0] }}
            </p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.phone_number"
                    id="phone_number"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.phone_number }"
                />
                <label for="phone_number">Phone Number</label>
            </div>
            <p v-if="errors?.phone_number" class="text-danger">
                {{ errors.phone_number[0] }}
            </p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.first_line"
                    id="first_line"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.first_line }"
                />
                <label for="first_line">Address line 1</label>
            </div>
            <p v-if="errors?.first_line" class="text-danger">
                {{ errors.first_line[0] }}
            </p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.second_line"
                    id="second_line"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.second_line }"
                />
                <label for="second_line">Address line 2 (optional)</label>
            </div>
            <p v-if="errors?.second_line" class="text-danger">
                {{ errors.second_line[0] }}
            </p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.city"
                    id="city"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.city }"
                />
                <label for="city">City</label>
            </div>
            <p v-if="errors?.city" class="text-danger">{{ errors.city[0] }}</p>
            <div class="form-floating mb-1">
                <input
                    type="text"
                    v-model="formData.postcode"
                    id="postcode"
                    class="form-control"
                    :class="{ 'is-invalid': errors?.postcode }"
                />
                <label for="postcode">Postcode</label>
            </div>
            <p v-if="errors?.postcode" class="text-danger">
                {{ errors.postcode[0] }}
            </p>
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
    first_line: "",
    second_line: "",
    city: "",
    postcode: "",
});
const postCustomer = async () => {
    try {
        checkForm();
        await axios.post("/api/customers", formData, {
            headers: {
                authorization: `Bearer ${localStorage.getItem("token")}`,
            },
        });
        router.push("/");
    } catch (error) {
        if (error.response) {
            errors.value = error.response.data.errors;
        } else {
            errors.value = error;
        }
    }
};

const checkForm = () => {
    const formErrors = {};
    if (!formData.first_name) {
        formErrors.first_name = ["The first name field is required."];
    }
    if (!formData.surname) {
        formErrors.surname = ["The surname field is required."];
    }
    if (!formData.email) {
        formErrors.email = ["The email field is required."];
    }
    if (!formData.phone_number) {
        formErrors.phone_number = ["The phone number field is required."];
    }
    if (!formData.first_line) {
        formErrors.first_line = ["The address line 1 field is required."];
    }
    if (!formData.city) {
        formErrors.city = ["The city field is required."];
    }
    if (!formData.postcode) {
        formErrors.postcode = ["The postcode field is required."];
    }
    if (Object.keys(formErrors).length > 0) {
        throw formErrors;
    }
};
</script>
