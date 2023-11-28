<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" v-model="name" placeholder="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" v-model="description" placeholder="description" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" v-model="price" placeholder="price" class="form-control">
        </div>
        <div class="mb-3">
            <router-link :to="{name: 'product.index'}" class="btn btn-outline-secondary me-3">
                Cancel
            </router-link>
            <input @click.prevent="updateProduct" type="submit" value="Save" class="btn btn-outline-primary">
        </div>
    </div>
</template>

<script>
export default {
    name: "Edit",

    data() {
        return {
            name: null,
            description: null,
            price: null,
        }
    },

    mounted() {
        this.getProduct()
    },

    methods: {
        getProduct() {
            axios.get(`/api/products/${this.$route.params.id}`)
                .then(res => {
                    this.name = res.data.data.name
                    this.description = res.data.data.description
                    this.price = res.data.data.price
                })
        },

        updateProduct() {
            axios.patch(`/api/products/${this.$route.params.id}`, {
                name: this.name,
                description: this.description,
                price: this.price,
            })
                .then(res => {
                    this.$router.push({name: 'product.show', params: {id: this.$route.params.id}})
                })
        }
    }
}
</script>

<style scoped>

</style>
