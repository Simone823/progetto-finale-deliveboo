<template>
    <div>
        <MyHeader />
        <div class="container">
        <!-- TODO passare il nome della città  -->
        <h5 class="pt-4 m-0">Scegli la tipologia di ristorante:</h5> 
        <div class="row flex-column flex-md-row py-5">

            <!-- checkboxe sidebar -->
            <aside class="col-12 col-md-3">
                <ul class="d-flex flex-row flex-md-column flex-wrap flex-md-nowrap gap-2 justify-content-center p-0">
                    <li class="form-group form-check" v-for="type in types" :key="type.id">
                        <input type="checkbox" class="form-check-input" :value="type" :id="type.name" name="type-checkboxe" v-model="checkedTypes">
                        <label :for="type.name">{{type.type_name}}</label>
                    </li>
                </ul>
            </aside>

            <!-- resturants list -->
            <div class="col-12 col-md-9">
                <div v-if="checkedTypes.length != 0" class="types-wrapper pb-4 px-md-0 d-flex gap-4 flex-wrap justify-content-center justify-content-md-start">
                    <!-- stampo il nome delle tipologie che vengono selezionare -->
                    <div v-for="(el,index) in checkedTypes" :key="index">
                        <span class="badge rounded-pill btn-green_1 text-light">#{{el.type_name}}</span>
                    </div>
                </div>

                <!-- Se l'array composto dai valori delle checkboxe è vuoto mostro tutti i ristoranti -->
                <div v-if="checkedTypes.length == 0" class="d-flex flex-wrap gap-3 px-4 px-md-0">
                    <!-- cliccando la card verrò reindirizzato alla rotta resturant-menu -->
                    <div class="card col-12 col-md-4 col-lg-3 text-center" 
                        v-for="resturant in resturants" :key="resturant.id">
                            <figure class="post-card-img">
                                <img v-if="resturant.business_image" :src="`/storage/${resturant.business_image}`" class="card-img-top" alt="...">
                                <img v-else :src="require('/public/img/placeholder_restaurants.png')" alt="">
                            </figure>
                            <div class="card-body">
                                <h5 class="card-title fs-5 mt-1 mb-1 whitespace">{{ resturant.business_name }}</h5>
                                <div class="info-wrapper">
                                    <p class="mb-1">{{ resturant.name }} {{ resturant.surname }}</p>
                                    <p class="text-muted">{{ resturant.business_address }}</p>
                                </div>
                            </div>
                            
                            <div class="button-wrapper">
                                <router-link tag="button" class="btn btn-green_1 mb-3" :to="{ name: 'resturant-menu', params: { id: resturant.id } }">
                                    Vai al ristorante
                                </router-link>
                            </div>        
                    </div>
                </div>

                <!-- Se l'array composto dai valori delle checkboxe non è vuoto mostro i ristoranti con le tipologie selezionate -->
                <div v-if="checkedTypes.length != 0" class="d-flex flex-wrap gap-3 px-4 px-md-0">
                    <!-- cliccando la card verrò reindirizzato alla rotta resturant-menu -->
                    <div class="card col-12 col-md-4 col-lg-3 text-center" 
                        v-for="(selectedRestuantType, index) in selectedResturantsTypes" :key="index">     
                            <figure class="post-card-img">
                                <img v-if="selectedRestuantType.business_image" :src="`/storage/${selectedRestuantType.business_image}`" class="card-img-top" alt="...">
                                <img v-else :src="require('/public/img/placeholder_restaurants.png')" alt="">
                            </figure>
                            <div class="card-body">
                                <h5 class="card-title fs-5 mt-1 mb-1 whitespace">{{ selectedRestuantType.business_name }}</h5>
                                <div class="info-wrapper">
                                    <p class="mb-1">{{ selectedRestuantType.name }} {{ selectedRestuantType.surname }}</p>
                                    <p class="text-muted">{{ selectedRestuantType.business_address }}</p>
                                </div>
                            </div>
                            <div class="button-wrapper">
                                <router-link tag="button" class="btn btn-green_1 mb-3" :to="{ name: 'resturant-menu', params: { id: selectedRestuantType.user_id } }">
                                    Vai al ristorante
                                </router-link>
                            </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import MyHeader from '../components/MyHeader.vue'

export default {
    components:{
        MyHeader,
    },

    data() {
        return{
            //array che contiente tutti i ristoratori(user)
            resturants: [],
            //array che contiene tutte le tipologie
            types: [],
            //array che dinamicamente viene aggiornato ogni volta che viene cliccata una checkbox
            checkedTypes: [],
            resturantsTypes: [],
            selectedResturantsTypes: [],
        }
    },

    watch: {
        //ascolto ogni cambiamento dell'array di checkbox
        checkedTypes(newVal, oldVal) {
            // svuoto l'array per ricomporlo da capo ogni volta che si preme una checkbox
            this.selectedResturantsTypes = [];
            let arrayTypesId = [];
            // ciclo il nuovo array che arriva selezionando le checkbox
            for (let i = 0; i < newVal.length; i++) {
                // pusho gli id delle checkbox selezionate in un nuovo array
                arrayTypesId.push(newVal[i].id );
            }
            for(let i = 0; i < this.resturantsTypes.length; i++){
                // se gli id, dell'array che contiene gli utenti con le rispettive categorie, 
                // contiene gli id delle checkboxe allora pusho l'intero utente in un nuovo array
                if( arrayTypesId.includes( this.resturantsTypes[i].type_id )){
                    this.selectedResturantsTypes.push(this.resturantsTypes[i])
                }
            }
            //rimuovo gli utenti duplicati tramite una funzione
            function removeDuplicates(data, key) {  
                return [...new Map(data.map(item => [key(item), item])).values()]
            };
            //aggiorno l'array senza i duplicati
            this.selectedResturantsTypes = removeDuplicates(this.selectedResturantsTypes, item => item.user_id)
        }
    },

    methods: {
        fetchCityResturants(){
            // faccio una chiamata axios per recuperare i ristoranti
            axios.get('/api/city-resturants')
            .then( res => {
                this.resturants = res.data.users;
                this.resturantsTypes = res.data.users_type
                this.types = res.data.types;
            })
            .catch( err => {
                console.warn(err);
            })
        },
    },

    mounted() {
        this.fetchCityResturants();
    }
}
</script>

<style lang"scss" scoped>
    .bg-green_1{
        background-color: #00ccbc;
    }

    .whitespace{
        white-space: nowrap;
    }
</style>