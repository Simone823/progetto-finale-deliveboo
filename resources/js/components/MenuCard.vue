<template>
    <!-- TODO vanno sistemate le media query  -->
    <div class="card-menu col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card-wrapper">
            <div class="card-header p-0">
                <figure class="post-card-img m-0">
                    <!-- TODO inserire immagine -->
                    <img src="https://i.picsum.photos/id/431/5398/3599.jpg?hmac=bc325kFqsm626RGhgs-XwG_GFqd4x3VmXtramO12qL8" alt="">
                </figure>
            </div>
            <div class="card-body">
                <h5>{{ menuPlate.name }}</h5>
                <div class="info-wrapper">
                    <span class="ingredients m-0">Ingredienti:</span>
                    <p class="ingredients-list m-0">{{ menuPlate.ingredients }}</p>
                    <span class="price">Prezzo: {{ menuPlate.price }}&euro;</span>
                </div>
            </div>
            <div class="card-footer">
                qui ci andrà il pulsante (- / +)
            </div>
        </div>
    </div>
</template>

<script>
export default {
    //tramite props prendo le info dei singoli piatti
    props:{
        menuPlate: {
            type: Object,
            required: false,
        }
    }
}
</script>

<style lang="scss" scoped>

    figure{
            width: 100%;
            aspect-ratio: 5/4;
            overflow: hidden;
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
            &:hover img{
                transform: scale(1.1,1.1);
                transition: all 500ms;
            }
        }
    .card-wrapper{
        cursor: pointer;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
        aspect-ratio: 9/16;
        position: relative;
        background-color: beige;

        .ingredients{
            font-weight: 600;
        }

        .ingredients-list{
            height: 50px;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0 10px 0 0;
        }
        
        .card-footer{
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track{
            background-color: #D0EB99;
            border-radius: 100px;
            margin-right: 0;
        }

        ::-webkit-scrollbar-thumb{
            background-color: #00CCBC;
            border-radius: 100px;
        }

        ::-webkit-scrollbar-thumb:hover{
            background-color: #14ebd9;
        }
    }

</style>