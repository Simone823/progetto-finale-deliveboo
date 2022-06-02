<template>
    <section class="bg-green p-0">
             <div class="container p-0">
                <div class="row flex-wrap justify-content-center align-items-center p-0">
                    
                    <div class="col-12 col-sm-6 col-sx py-sm-2 px-4">
                        <h4 class="jumbotron_title fs-2 ">I piatti che vuoi, a casa tua.</h4>
                        <label for="address" class="text-white fs-5" class-form-label>Inserisci il tuo indirizzo per trovare ristoranti nei dintorni</label>
                        <div class="d-flex align-items-start gap-2 ">
                            <div class="d-flex flex-column flex-grow-1">
                                <input class="address form-control" v-model="inputAddress" type="text" id="address" name="address" placeholder="Inserisci il tuo indirizzo completo">
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <!-- TODO disabilitare il bottone -->
                            <router-link tag="button" :to="inputAddress != '' ? '/city-resturants' : '/' "
                                class="btn btn-white">
                                    Cerca
                            </router-link>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="jumbotron_image" :src="require('/public/img/motocycle.png')" alt="">
                        </div>
                            
                    </div>
                </div>
            </div>
    </section>
</template>

<script>
    export default {

        
        
    }
</script>

<style lang="scss" scoped>
    .bg-green{
        background-color:#00CCBC;
        position: relative;

        &::after{
            display: block;
            content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1920.78 273.12'%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23d0eb99;%7D%3C/style%3E%3C/defs%3E%3Cg id='Livello_2' data-name='Livello 2'%3E%3Cg id='Livello_1-2' data-name='Livello 1'%3E%3Cpolygon class='cls-1' points='1920.78 273.12 0 273.12 0 157.14 1920.78 0 1920.78 273.12'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            position: absolute;
            width: 100%;
            bottom: -7px;
        }

        .jumbotron_title{
            color: #3e235d;
            font-weight: 800;
        }



        .jumbotron_image{
            width: 60%;
            display: block;
            z-index: 999;
        }

        .col-sx{
            z-index: 999;
        }
        
        

    }
</style>