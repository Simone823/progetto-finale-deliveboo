<template>
    <section>
        <div class="container">
            <h1 class="fw-bold fs-1 mb-4">Novità dalla nostra cucina</h1>
            <div class="row">
                <div class="d-flex flex-wrap align-items-center stripes_wrapper">
                    <div class="col-12 col-sm-6 bg-pizza col-50"></div>
                    <div class="col-12 col-sm-6 text_wrapper pt-4 ps-sm-5">
                        <h3 class="fw-bold fs-4">Deliveboo for Work</h3>
                        <p>Clienti o colleghi affamati? Il nostro team di esperti ti aiuterà</p>
                        <button class="btn btn-green_1"><span class="text-white fw-bold fs-6 p-1">Contattaci</span></button>
                    </div>
                </div>

                <div class="d-flex align-items-center stripes_wrapper mb-2 flex-wrap pt-5">
                    <div class="d-block d-sm-none col-12 bg-app col-50"></div>

                    <div class="col-12 col-sm-6 text_wrapper pt-4">
                        <h3 class="fw-bold fs-4">Hai già la nostra app?</h3>
                        <p>Scaricala ora - disponibile su Apple store e Google Play!</p>
                        <div class="d-flex gap-2 ">
                            <div class="col-12 col-sm-6 col-md-12">
                                <img class="store_badge mb-1" src="img/MyNews/android.png" alt="android" style="cursor:pointer;">
                                <img class="store_badge mb-1" src="img/MyNews/apple.png" alt="apple" style="cursor:pointer;">
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-sm-block col-6 bg-app col-50"></div>
                </div>
                
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'MyNews'
    }
</script>

<style lang="scss" scoped>
    section{
        background-color: #F9FAFA;
             .col-50{
                height: 175px;
                background-size: cover;
                background-position: center;
                overflow: hidden;
                position: relative;

                .text_wrapper{
                    z-index: 999;
                    background-color: white;
                }
            }

            .store_badge{
                height: 35px;
            }
                  
        
           
    }


    .bg-pizza{
        background-image: url('/img/MyNews/pizza.png');
        clip-path: polygon(0 0, 100% 0, 87% 100%, 0% 100%);
    }

    .bg-app{
        background-image: url('/img/app_deliveboo.png');
        clip-path: polygon(13% 0, 100% 0, 100% 100%, 0% 100%);
    }
</style>