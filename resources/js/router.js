import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/HomeRoute.vue"),
    },
    {
        path: "/login",
        component: () => import("./Pages/LoginRoute.vue"),
    },
    {
        path: "/customers/add",
        component: () => import("./Pages/AddCustomerRoute.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
