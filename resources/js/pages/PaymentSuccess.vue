<template>
    <div>
        <MyHeader/>

        <!-- Container  -->
        <div class="container py-5 px-2 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center m-0 w-100">
                <div class="col-12 col-md-8 card align-items-center justify-content-center shadow-lg text-center">

                    <!-- Payment -->
                    <div class="payment mb-5">
                        <figure class="icon_logo m-auto mb-2">
                            <img :src="require('/public/img/card.png')" alt="">
                        </figure>


                        <div class="description text-violet">
                            <p class="fw-bold fs-4">Pagamento effettuato con successo!</p>
                        </div>
                    </div>


                    <!-- Driver -->
                    <div class="driver">
                        <figure class="icon_driver m-auto mb-1">
                            <img :src="require('/public/img/spy.png')" alt="">
                        </figure>

                        <div class="description text-violet">
                            <p class="fw-bolder fs-5">Driver in arrivo!</p>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="button">
                        <a href="/" class="btn-green_1 btn pay-button">
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
        },
    }
</script>

<style lang="scss" scoped>


.container {
    height: 80vh;
}

.card {
    height: 500px;
    border: none;
    background: url('/public/img/placeholder_plate.png');

    .icon_logo {
        width: 120px;
        height: 120px;

        img {
            width: 100%;
            height: 100%;
            display: block;
        }
    }

    .icon_driver {
        width: 50px;
        height: 50px;

        img {
            width: 100%;
            height: 100%;
            display: block;
        }
    }
}

</style>