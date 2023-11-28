<template>
    <div v-if="product">
        <div class="mb-3">
            Name: {{ this.product.name }}
        </div>
        <div class="mb-3">
            Description: {{ this.product.description }}
        </div>
        <div class="mb-3">
            Price: {{ this.product.price }}
        </div>
        <div class="mb-3">
            <img :src="product.imagePath" alt="Product Image" class="img-thumbnail">
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
                    this.product.imagePath = `/storage/${this.product.image}`;
                })
        },
    }
}
</script>

<style scoped>

.img-thumbnail {
    max-width: 200px;
    max-height: 200px;
    width: auto;
    height: auto;
}
</style>
