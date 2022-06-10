<template>
    <div>
        <MyHeader />
        <div class="error-page d-flex justify-content-center align-items-center">
        <div class="container text-center">
            <h1 class="error-title">404</h1>
            <p>Page not found!</p>
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
    .error-page{
        min-height: calc(100vh);
    }
    .error-title{
        font-size: 120px;
        font-weight: 700;
    }
</style>