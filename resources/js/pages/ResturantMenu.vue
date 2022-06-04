<template>
    <div>
        
        <main>
            <!-- sezioni che contiene le info del ristorante selezionato -->
            <section id="resturant-info">
                <!-- container che contiene l'immagine del ristorante e le sue info principale  -->
                <div class="container-custom row p-0 p-md-3 px-lg-5 py-lg-4">
                    <figure class="resturant-img col-12 col-md-4 p-0 m-0">
                        <!-- TODO aggiungere immagine -->
                        <img src="https://i.picsum.photos/id/292/3852/2556.jpg?hmac=cPYEh0I48Xpek2DPFLxTBhlZnKVhQCJsbprR-Awl9lo" alt="">
                    </figure>
                    <!-- info ristorante prese dal DB  -->
                    <div class="resturant-details col-12 col-md-8 p-4 px-md-4 py-md-0">
                        <h1 class="resturant-name">{{ resturant.business_name }}</h1>
                        <p class="m-0 fs-5">Di {{ `${ resturant.name + ' ' + resturant.surname }` }}</p>
                        <p class="m-0 fs-6">In {{ `${ resturant.business_address + ' (' + resturant.business_city + ') '}` }}</p>
                        <span class="fs-6">CAP: {{resturant.business_cap}} / P.Iva: {{resturant.p_iva }}</span>
                        <span class="d-block fs-6">Email: {{ resturant.email }}</span>
                    </div>
                </div>
            </section>
            <!-- sezione che contiene il menù del ristorante -->
            <section id="resturant-menu">
                <div class="container-custom p-4 p-md-3 px-lg-5 py-lg-4">
                    <h3>Ecco il nostro menù</h3>
                    <!-- ciclo il componente MenuCard per stampare tutti i piatti  -->
                    <div class="cards-wrapper row justify-content-start">
                        <div class="card-menu col-12 col-md-6 col-lg-4 gap-2 mb-4"
                            v-for="(menuPlate,index) in menuPlates" :key="index"
                            v-on:click="viewPlate(index)">
                            <div class="card-wrapper p-3 d-flex justify-content-between">
                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title">{{ menuPlate.name }}</h5>
                                    <span>{{ menuPlate.price }}&euro;</span>
                                </div>
                                <div class="align-self-center justify-content-center">
                                    <figure class="post-card-img m-0">
                                        <!-- TODO inserire immagine -->
                                        <img src="https://i.picsum.photos/id/431/5398/3599.jpg?hmac=bc325kFqsm626RGhgs-XwG_GFqd4x3VmXtramO12qL8" alt="">
                                    </figure>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- TODO quando sono sull'elemento active si deve bloccare la possibilità di scrollare la pagina  -->
            <!-- gestione del componente(piatto) attivo -->
            <div :class=" [activeElement != undefined ? 'active' : '','info-wrapper d-flex justify-content-center align-items-center'] ">
                <div :class=" [ activeElement != undefined && activeElement == index ? 'active' : '','info-plate-card'] "
                    v-for="(menuPlate,index) in menuPlates" :key="index">
                    <button class="close-info" @click="closePlateInfo()">X</button>
                    <figure class="info-plate-img">
                        <img src="https://i.picsum.photos/id/431/5398/3599.jpg?hmac=bc325kFqsm626RGhgs-XwG_GFqd4x3VmXtramO12qL8" alt="">
                    </figure>
                    <div class="info-plate-body p-5">
                        <h1>{{ menuPlate.name }}</h1>
                        <div class="info-plate-ingredients py-5">
                            <span>Ingredienti:</span>
                            <ul>
                                <li v-for="(ingredient,index) in ingredients" :key="index">
                                    {{ ingredient }}
                                </li>
                            </ul>
                        </div>
                        <div class="cart-management">
                            <div class="plates-number d-flex justify-content-center align-items-center gap-5 py-5">
                                <!-- TODO gestione da sistemare con dei metodi  -->
                                <button class="number-button">-</button>
                                <span>N</span>
                                <button class="number-button">+</button>
                            </div>
                            <!-- TODO gestire il prezzo dinamicamente  -->
                            <div class="add-cart d-flex justify-content-center">
                                <button class="btn btn-green_1 py-2 px-5">Aggiungi per {{menuPlate.price}}&euro;</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
        
    </div>
</template>

<script>

export default {

    data() {
        return {
            activeElement: undefined,
            resturant: [],
            menuPlates: [],
            ingredients: [],
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
            this.ingredients = this.menuPlates[i].ingredients.split(',');
        },
        closePlateInfo(){
            this.activeElement = undefined;
        }
    },
    mounted() {
        this.fetchResturantInfo();
    },
}
</script>

<style lang="scss" scoped>

    .container-custom{
        max-width: 1940px;
        margin: 0 auto;
    }

    .resturant-name{
        font-size: 35px;
        font-weight: 700;
    }

    .resturant-img{
        height: 385px;
        border-radius: 5px;
        overflow: hidden;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        &:hover img{
            transform: scale(1.05,1.05);
            transition: all 800ms;
        }
    }

    .card-wrapper{
        cursor: pointer;
        border-radius: 3px;
        overflow: hidden;
        background-color: white;
        height: 132px;
        box-shadow: 0px 0px 5px 0px #b5b5b563;

        &:hover{
            box-shadow: 0px 16px 16px 2px rgb(181 181 181 / 39%);
            transition: all 300ms;
        }

        &:hover img{
            transform: scale(1.1,1.1);
            transition: all 500ms;
        }

        .post-card-img{
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 3px;
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
        }
    }

    .info-wrapper{
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: -1;
        display: none;
    }

    .info-wrapper.active{
        z-index: 10;

        &::after{
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.552);
            z-index: 0;
            animation: bkc 300ms linear 1;
        }

        @keyframes bkc{
            from{
                background-color: transparent;
            }
            to{
                background-color: rgba(0, 0, 0, 0.552);
            }
        }
    }

    .info-plate-card{
        position: relative;
        outline: none;
        border-radius: 8px;
        max-width: 560px;
        width: 90%;
        display: none;
        background-color: white;
        overflow: hidden;
        z-index: 9999;

        .close-info{
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background-color: white;
            color: #00CCBC;
            font-size: 18px;
            font-weight: 600;
        }

        .info-plate-img{
            width: 100%;
            height: 400px;
            overflow: hidden;
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
        }

        .info-plate-body{
            padding: 25px 20px;
        }
    }

        .info-plate-card.active{
            display: block;
            animation: zoom 300ms linear 1;
        }

        @keyframes zoom{
            from{
                transform: scale(0.3, 0.3);
            }
            to{
                transform: scale(1, 1);
            }
        }

        .info-plate-ingredients{
            border-bottom: 1px solid rgb(209, 209, 209);
        }
</style>