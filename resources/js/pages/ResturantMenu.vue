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
                    <div class="cards-wrapper row justify-content-start">
                        <div class="card-menu col-12 col-md-6 col-lg-4 gap-2 mb-3"
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
            <!-- gestione del componente attivo -->
            <div :class=" [activeElement != undefined ? 'active' : '','info-wrapper'] ">
                <div :class=" [ activeElement != undefined && activeElement == index ? 'active' : '','info-plate-card'] "
                    v-for="(menuPlate,index) in menuPlates" :key="index">
                    <button class="close-info" @click="closePlateInfo()">X</button>
                    <figure class="info-plate-img">
                        <img src="https://i.picsum.photos/id/431/5398/3599.jpg?hmac=bc325kFqsm626RGhgs-XwG_GFqd4x3VmXtramO12qL8" alt="">
                    </figure>
                    <div class="info-plate-body">
                        <h1>{{ menuPlate.name }}</h1>
                        <div class="info-plate-ingredients">
                            <span>Ingredienti:</span>
                            <ul>
                                <li v-for="(ingredient,index) in ingredients" :key="index">
                                    {{ ingredient }}
                                </li>
                            </ul>
                        </div>
                        <div class="cart-management">
                            <div class="plates-number">
                                <button class="number-button"></button>
                                
                                <button class="number-button"></button>
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

    .card-wrapper{
        cursor: pointer;
        border-radius: 5px;
        overflow: hidden;
        background-color: beige;
        height: 132px;

        &:hover img{
            transform: scale(1.1,1.1);
            transition: all 500ms;
        }

        .post-card-img{
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            overflow: hidden;
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
        }
    }

    .info-wrapper{
        width: 100%;
        height: 100vh;
        position: absolute;
        top: 0;
        display: none;
    }

    .info-wrapper.active{
        display: block;
    }

    .info-plate-card{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50% , -50%);
        border-radius: 8px;
        max-width: 839px;
        width: 100%;
        display: none;
        background-color: azure;
        overflow: hidden;

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
        }

        .info-plate-body{
            padding: 25px 20px;
        }
    }

        .info-plate-card.active{
            display: block;
        }

        .info-plate-ingredients{
            border-bottom: 1px solid rgb(209, 209, 209);
        }
</style>