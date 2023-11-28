import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/products', component: () => import('./components/Product/Index.vue'),
        name: 'product.index'
    },
]

const router = createRouter({
    history: createWebHistory(),

    routes,
})
export default router;