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

router.beforeEach(async (to, from) => {
    await store.getUser();
    if (!store.user && to.path !== "/login") {
        return "/login";
    } else if (store.user && to.path === "/login") {
        return "/";
    }
});

export default router;
