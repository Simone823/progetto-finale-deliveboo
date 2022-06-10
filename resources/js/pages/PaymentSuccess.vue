<template>
    <div>
        <MyHeader/>

        <!-- Container  -->
        <div class="container py-5 px-2">
            <div class="row justify-content-center m-0">
                <div class="col-12 col-md-8 card d-flex justify-content-center align-items-center flex-column gap-3">

                    <!-- Logo check -->
                    <figure class="icon_logo">
                        <img :src="require('/public/img/check_icon.png')" alt="">
                    </figure>

                    <!-- Description -->
                    <div class="description">
                        <h2 class="fw-bold">Pagamento effettuato con successo!</h2>
                    </div>

                    <!-- Button -->
                    <div class="button">
                        <a href="/" class="btn rounded btn-info">
                            Torna alla HomePage
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import MyHeader from '../components/MyHeader.vue';
    export default {
        components: {
            MyHeader,
        }
    }
</script>

<style lang="scss" scoped>

.card {
    height: 500px;

    .icon_logo {
        width: 100px;
        height: 100px;

        img {
            width: 100%;
            height: 100%;
            display: block;
        }
    }
}

</style>