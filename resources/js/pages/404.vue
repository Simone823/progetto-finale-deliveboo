<template>
    <div class="error-wrapper d-flex flex-column">
        <MyHeader />
        <div class="container flex-grow-1 d-flex justify-content-center align-items-center">
            <div class="text-center title">
                <h1 class="error-title fw-bolder">404</h1>
                <p class="fs-4 fw-bold">PAGE NOT FOUND!</p>
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

    .title{
        z-index: 999;

        .error-title{
            font-size: calc(2.5vh + 5vw + 85px);
            color: #00CCBC;
        }
        p{
            color: #333;
        }
    }

    .error-wrapper{
        background-image: url("../../../public/img/placeholder_plate.png");
        background-size: cover;
        background-position: center;
        &::after{
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.072);
            z-index: 0;
        }
    }
</style>