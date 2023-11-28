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
            <input @click.prevent="storeProduct" type="submit" value="Create" class="btn btn-outline-primary">
        </div>
    </div>
</template>

<script>
export default {
    name: "Create",

    data() {
        return {
            name: '',
            description: '',
            price: null,
        }
    },

    methods: {
        storeProduct() {
            axios.post('/api/products', {name: this.name, description: this.description, price: this.price,})
                .then(res => {
                    this.$router.push({name: 'product.index'})
                })
                .catch(error => {
                    console.error('Error while creating product:', error);
                });
        }
    }
}
</script>

<style scoped>

</style>
