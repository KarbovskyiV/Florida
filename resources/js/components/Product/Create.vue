<template>
    <div class="w-25">
        <form @submit.prevent="storeProduct" enctype="multipart/form-data">
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
                <label for="image" class="form-label">Select Image</label>
                <input type="file" id="image" ref="imageInput" @change="handleImageChange" class="form-control">
            </div>
            <div class="mb-3">
                <router-link :to="{name: 'product.index'}" class="btn btn-outline-secondary me-3">
                    Back
                </router-link>
                <button type="submit" class="btn btn-outline-primary">Create</button>
            </div>
        </form>
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
            image: null,
        }
    },

    methods: {
        storeProduct() {
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('image', this.image);
            formData.append('description', this.description);
            formData.append('price', this.price);

            axios.post('/api/products', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then(res => {
                    this.$router.push({name: 'product.index'})
                })
                .catch(error => {
                    console.error('Error while creating product:', error);
                });
        },

        handleImageChange(event) {
            this.image = event.target.files[0];
        }
    }
}
</script>

<style scoped>

</style>
