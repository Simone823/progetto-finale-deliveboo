<template>
    <div class="container">
        <h1 class="fw-bold fs-1 mb-4">La selezione di Deliveboo</h1>
        <!-- Prima Row -->
        <div class="row">
            <div class="col-6 col-sm-4 pt-2 pb-2">
                <div class="card_wrapper d-flex justify-content-center align-items-center bg-hamburger">
                    <h1 class=" fw-bold fs-sm-3 text-white text-center card_title">Comfort Food</h1>
                </div>
                <p class="card_text pt-2 pb-2 mb-0">
                    I grandi classici che scaldano il cuore, perfetti in ogni momento.
                </p>
                <a href="#"><span class="link">Scopri Comfort food</span></a>
            </div>

            <div class="col-6 col-sm-8 pt-2 pb-2">
                <div class="card_wrapper d-flex justify-content-center align-items-center bg-dessert">
                    <h1 class=" fw-bold fs-sm-3 text-white card_title text-center">Dolci e Dessert</h1>
                </div>
                <p class="card_text pt-2 pb-2 mb-0">
                    Dolci piaceri per rendere la giornata ancora più gustosa.
                </p>
                <a href="#"><span class="link">Scopri Dolci e dessert</span></a>
            </div>
        </div>
        <!-- Seconda Row -->
        <div class="row">
            <div class="col-6 col-sm-8 pt-2 pb-2">
                <div class="card_wrapper d-flex justify-content-center align-items-center bg-salad">
                    <h1 class=" fw-bold fs-sm-3 text-white card_title text-center">Perfetti da condividere</h1>
                </div>
                <p class="card_text pt-2 pb-2 mb-0">
                    Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in un vera festa.
                </p>
                <a href="#"><span class="link">Scopri Perfetti da condividere</span></a>
            </div>

            <div class="col-6 col-sm-4 pt-2 pb-2">
                <div class="card_wrapper d-flex justify-content-center align-items-center bg-gyoza">
                    <h1 class=" fw-bold fs-sm-3 text-white text-center card_title">Esclusiva Deliveboo</h1>
                </div>
                <p class="card_text pt-2 pb-2 mb-0">
                    I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveboo.
                </p>
                <a href="#"><span class="link">Scopri Esclusive Deliveboo</span></a>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "MySelection"
    }
</script>

<style lang="scss" scoped>
    // Sezione Link
    a{
        text-decoration: none;
    }
    .link{
            cursor: pointer;
            color: #32a8ab;
            
    }

    // Sezione Card


    .card_wrapper{
        height: 150px;
        width: 100%;
        background-size: cover;
        background-position: center;
        border-radius: 5px;
        overflow: hidden;
        position: relative;

        .card_title{
            filter: drop-shadow(2px 0px 11px #000000);
        }

    }
    
    .card_text{
        max-width: 650px;
    }

    // Sezione Background

    .bg-hamburger{
        background-image: url('/img/MySelection/hamburger.jpg');
    }
    
    .bg-dessert{
        background-image: url('/img/MySelection/dessert.jpg');
    }

     .bg-salad{
        background-image: url('/img/MySelection/salad.jpg');
    }

     .bg-gyoza{
        background-image: url('/img/MySelection/gyoza.jpg');
    }

</style>