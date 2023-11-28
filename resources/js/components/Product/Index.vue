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
        <tr v-for="product in products">
            <th>{{ product.id }}</th>
            <td>{{ product.name }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td>
                <router-link :to="{name: 'product.edit', params: {id: product.id}}">Edit</router-link>
            </td>
            <td>
                <a @click.prevent="destroyProduct(product.id)" href="#" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            products: null
        }
    },

    mounted() {
        this.getProducts()
    },

    methods: {
        getProducts() {
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data.data
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
