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
    {
        path: '/:id/edit', component: () => import('./components/Product/Edit.vue'),
        name: 'product.edit'
    },
    {
        path: '/:id', component: () => import('./components/Product/Show.vue'),
        name: 'product.show'
    },
]

const router = createRouter({
    history: createWebHistory(),

    routes,
})
export default router;
