import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/', component: () => import('./components/Product/Index.vue'),
        name: 'product.index'
    },
    {
        path: '/create', component: () => import('./components/Product/Create.vue'),
        name: 'product.create'
    },
]

const router = createRouter({
    history: createWebHistory(),

    routes,
})
export default router;
