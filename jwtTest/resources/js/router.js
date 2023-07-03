import * as VueRouter from "vue-router";


const routes = [
    {
        path: "/fruits", component: () => import("./components/Fruit/Index.vue"),
        name: "fruit.index",
    },

    {
        path: "/users/login", component: () => import("./components/Users/Login.vue"),
        name: "users.login",
    },

    {
        path: "/users/registration", component: () => import("./components/Users/Registration.vue"),
        name: "users.registration",
    },

    {
        path: "/users/personal", component: () => import("./components/Users/Personal.vue"),
        name: "users.personal",
    },

    {
        path: "/pathMatch(.*)*", component: () => import("./components/Users/Personal.vue"),
        name: "404",
    },


];


export const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory("/"),
    routes,
});

router.beforeEach((to, from, next) => {
    const accessToken = localStorage.getItem("access_token");

    if (!accessToken) {
        if (to.name === "users.login" || to.name === "users.registration") {
            return next();
        } else {
            return next({
                name: "users.login",
            });
        }
    }
    if (to.name === "users.login" || to.name === "users.registration"  && accessToken) {
        return next({
            name: "users.personal",
        });
    }

    next();
});
