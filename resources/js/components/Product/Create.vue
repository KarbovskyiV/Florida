<template>
    <div class="w-25">
        <Form @submit="storeProduct" enctype="multipart/form-data" v-slot:default="{errors}">
            <div class="mb-3">
                <input type="text" v-model="name" placeholder="name" class="form-control"
                       :class="{'is-invalid': name.length === 0 && errors.name}">
                <span class="invalid-feedback">{{ errors.name }}</span>
            </div>
            <div class="mb-3">
                <input type="text" v-model="description" placeholder="description" class="form-control"
                       :class="{'is-invalid': errors.description}">
                <span class="invalid-feedback">{{ errors.description }}</span>
            </div>
            <div class="mb-3">
                <input type="number" v-model="price" placeholder="price" class="form-control"
                       :class="{'is-invalid': price.length === 0 && errors.price}">
                <span class="invalid-feedback">{{ errors.price }}</span>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Select Image</label>
                <input type="file" id="image" ref="imageInput" @change="handleImageChange" class="form-control"
                       :class="{'is-invalid': errors.image}">
                <span class="invalid-feedback">{{ errors.image }}</span>
            </div>
            <div class="mb-3">
                <router-link :to="{name: 'product.index'}" class="btn btn-outline-secondary me-3">
                    Back
                </router-link>
                <button type="submit" class="btn btn-outline-primary">Create</button>
            </div>
        </Form>
    </div>
</template>

<script>
import {Form} from 'vee-validate';

export default {
    name: "Create",

    components: {Form},

    data() {
        return {
            name: '',
            description: '',
            price: '',
            image: '',
        }
    },

    methods: {
        storeProduct(values, actions) {
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
                    actions.setErrors(error.response.data.errors)
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
