<template>
    <div>

        <main>
            <!-- sezioni che contiene le info del ristorante selezionato -->
            <section id="resturant-info">
                <div class="constainer-fluid main-image">
                    <figure class="resturant-img">
                        <!-- TODO aggiungere immagine -->
                        <img src="https://i.picsum.photos/id/292/3852/2556.jpg?hmac=cPYEh0I48Xpek2DPFLxTBhlZnKVhQCJsbprR-Awl9lo" alt="">
                    </figure>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-6">
                            <h1>{{ resturant.business_name }}</h1>
                            <p class="m-0">Di {{ `${ resturant.name + ' ' + resturant.surname }` }}</p>
                            <p class="m-0">In {{ `${ resturant.business_address + ' (' + resturant.business_city + ') '}` }}</p>
                            <span>CAP: {{resturant.business_cap}} / P.Iva: {{resturant.p_iva }}</span>
                            <span class="d-block">Email: {{ resturant.email }}</span>
                        </div>
                    </div>
                </div> 
            </section>
            <!-- sezione che contiene il menù del ristorante -->
            <section id="resturant-menu">
                <div class="container pt-5">
                    <h3>Ecco il nostro menù</h3>
                    <!-- ciclo il componente MenuCard per stampare tutti i piatti  -->
                    <div class="cards-wrapper row justify-content-center">
                        <div class="card-menu col-12 col-sm-6 col-md-4 col-lg-3 mb-4"
                            v-for="(menuPlate,index) in menuPlates" :key="index"
                            v-on:click="viewPlate(index)">
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
                    </div>
                </div>
            </section>
            <!-- gestione del componente attivo -->
            <div class="info-wrapper">
                <div :class=" [activeElement != undefined ? 'active' : '','info-plate-card'] ">
                    <h1></h1>
                </div>
            </div>
        </main>
        
    </div>
</template>

<script>
import MenuCard from '../components/MenuCard.vue'

export default {

    components: {
        MenuCard,
    },

    data() {
        return {
            activeElement: undefined,
            resturant: [],
            menuPlates: [],
        }
    },
    methods: {
        fetchResturantInfo(){
            axios.get(`/api/resturant-menu/${this.$route.params.id}`)
            .then( res => {
                console.log(res);
                this.resturant = res.data.user[0];
                this.menuPlates = res.data.user_plates;
                console.log(this.menuPlates);
            })
            .catch( err => {
                console.warn(err);
            })
        },
        viewPlate(i){
            this.activeElement = i;
            console.log(this)
        }
    },
    mounted() {
        this.fetchResturantInfo();
    },
}
</script>

<style lang="scss" scoped>
    .resturant-img{
        height: 385px;
        width: 100%;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    }

    main{
        position: relative;
    }
    .post-card-img{
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
    .info-wrapper{
        width: 100%;
        height: 100vh;
        position: absolute;
    }
    .info-plate-card{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50% , -50%);
        padding: 15px;
        border-radius: 8px;
    }
</style>