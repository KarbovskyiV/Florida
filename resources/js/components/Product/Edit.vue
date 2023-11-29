<template>
    <div class="w-25">
        <Form @submit="updateProduct" enctype="multipart/form-data" v-slot:default="{errors}">
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
                <router-link :to="{name: 'product.index'}" class="btn btn-outline-secondary me-3">
                    Cancel
                </router-link>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
        </Form>
    </div>
</template>

<script>
import {Form} from 'vee-validate';

export default {
    name: "Edit",

    components: {Form},

    data() {
        return {
            name: '',
            description: '',
            price: '',
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

        updateProduct(values, actions) {
            axios.patch(`/api/products/${this.$route.params.id}`, {
                name: this.name,
                description: this.description,
                price: this.price,
            })
                .then(res => {
                    this.$router.push({name: 'product.show', params: {id: this.$route.params.id}})
                })
                .catch(error => {
                    actions.setErrors(error.response.data.errors)
                });
        }
    }
}
</script>

<style scoped>

</style>
