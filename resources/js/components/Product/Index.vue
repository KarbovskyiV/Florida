<template>
    <router-link :to="{name: 'product.create'}">Create</router-link>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="product in products.data" :key="product.id">
            <th>{{ product.id }}</th>
            <td>
                <router-link :to="{name: 'product.show', params: {id: product.id}}">{{ product.name }}</router-link>
            </td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td>
                <router-link :to="{name: 'product.edit', params: {id: product.id}}">Edit</router-link>
            </td>
            <td>
                <a @click.prevent="destroyProduct(product.id)" href="#" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        <Bootstrap5Pagination :data="products" @pagination-change-page="getProducts" />
        </tbody>
    </table>

</template>

<script>
import {Bootstrap5Pagination} from "laravel-vue-pagination";

export default {
    name: "Index",

    components: {
        Bootstrap5Pagination,
    },

    data() {
        return {
            products: {}
        }
    },

    mounted() {
        this.getProducts()
    },

    methods: {
        getProducts(page = 1) {
            axios.get(`/api/products?page=${page}`)
                .then(res => {
                    this.products = res.data
                })
                .catch(error => {
                    console.error('Error while fetching products:', error);
                });
        },

        destroyProduct(id) {
            axios.delete(`/api/products/${id}`)
                .then(res => {
                    this.getProducts()
                })
        }
    }
}
</script>

<style scoped>

</style>
