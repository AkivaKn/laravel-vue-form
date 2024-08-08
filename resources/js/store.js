import axios from "axios";
import { reactive } from "vue";
export const store = reactive({
    user: null,
    loginError: {},
    async login(formData) {
        try {
            const res = await axios.post("/api/login", formData);
            if (res.data.errors) {
                this.loginError = res.data.errors;
                return false;
            } else {
                localStorage.setItem("token", res.data.token);
                this.user = res.data.user;
                this.loginError = {};
                return true;
            }
        } catch (error) {
            if (error.response?.data?.errors) {
                this.loginError = error.response.data.errors;
                return false;
            }
        }
    },
    async logout() {
        try {
            const res = await axios.post("/api/logout", this.user,{
                headers: {
                    authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });
            this.user = null;
            localStorage.removeItem("token");
            return true;
        } catch (error) {
            console.log(error);
            return false;
        }
    },
    async getUser() {
        if (localStorage.getItem("token")) {
            const res = await axios.get("/api/user", {
                headers: {
                    authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });
            if (res.status === 200) {
                this.user = res.data;
            }
        }
    },
});
