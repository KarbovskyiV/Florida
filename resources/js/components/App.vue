<template>
    <div>
        <router-link :to="{name: 'product.create'}">Create</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App",
}
</script>

<style scoped>

</style>
