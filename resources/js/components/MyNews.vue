<template>
    <section>
        <div class="container">
            <h1 class="fw-bold fs-1 mb-4">Novità dalla nostra cucina</h1>
            <div class="row">
                <div class="d-flex align-items-center stripes_wrapper mb-2">
                    <div class="col-6 bg-pizza col-50"></div>
                    <div class="col-6 ps-5 pt-5 pb-5 text_wrapper ">
                        <h3 class="fw-bold fs-4">Deliveboo for Work</h3>
                        <p>Clienti o colleghi affamati? Il nostro team di esperti ti aiuterà</p>
                        <button class="btn btn-green_1"><span class="text-white fw-bold fs-6 p-1">Contattaci</span></button>
                    </div>
                </div>

                <div class="d-flex align-items-center stripes_wrapper mb-2">
                    <div class="col-6 pt-5 pb-5 text_wrapper ">
                        <h3 class="fw-bold fs-4">Hai già la nostra app?</h3>
                        <p>Scaricala ora - disponibile su Apple store e Google Play!</p>
                        <div class="d-flex gap-2 ">
                            <div class="col-12 col-sm-6">
                                <img class="store_badge mb-1" src="img/MyNews/android.png" alt="">
                                <img class="store_badge mb-1" src="img/MyNews/apple.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 bg-app col-50"></div>
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
        background-image: url('/img/pizza.jpg');
        clip-path: polygon(0 0, 100% 0, 87% 100%, 0% 100%);
    }

    .bg-app{
        background-image: url('/img/app_deliveboo.png');
        clip-path: polygon(13% 0, 100% 0, 100% 100%, 0% 100%);
    }
</style>