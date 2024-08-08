import { createRouter, createWebHistory } from "vue-router";
import { store } from "./store";

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

router.beforeEach((to, from) => {
    if (!store.user && to.path !== '/login') {
        return '/login'
    }
})

export default router;
