<template>
    <div class="error-wrapper d-flex flex-column">
        <MyHeader />
        <div class="container flex-grow-1 d-flex justify-content-center align-items-center">
            <div class="text-center">
                <h1 class="error-title fw-bolder">404</h1>
                <p class="fs-4">Page not found!</p>
            </div>
        </div>
    </div>
</template>

<script>
import MyHeader from '../components/MyHeader.vue'

export default {
    components: {
        MyHeader,
    },
}
</script>

<style lang="scss" scoped>
    .error-wrapper{
        height: 100vh;
    }

    .error-title{
        font-size: 80px;
        color: #00CCBC;
    }
</style>