<template>
    <div v-if="product">
        <div>
            Name: {{ this.product.name }}
        </div>
        <div>
            Age: {{ this.product.description }}
        </div>
        <div>
            Job: {{ this.product.price }}
        </div>
        <router-link :to="{name: 'product.index'}" class="btn btn-outline-secondary me-3">
            To all
        </router-link>
        <router-link :to="{name: 'product.edit', params: {id: this.product.id}}" class="btn btn-outline-primary">Edit</router-link>
    </div>
</template>

<script>
export default {
    name: "Show",

    data() {
        return {
            product: null
        }
    },

    mounted() {
        this.getProduct()
    },

    methods: {
        getProduct() {
            axios.get(`/api/products/${this.$route.params.id}`)
                .then(res => {
                    this.product = res.data.data
                })
        },
    }
}
</script>

<style scoped>

</style>
