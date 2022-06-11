<template>
    <div class="page-wrapper">
        <MyHeader />
        <div class="container">
            <div :class="[resturantsType.length == 0 ? 'justify-content-center' : '', 'row pt-5 pb-5']">
                 <!-- faccio un controllo per vedere se l'array contiene ristoranti -->
                <div v-if="resturantsType.length == 0" class="info-card p-0 m-0">
                    <figure class="info-img">
                        <img :src="require('/public/img/placeholder_restaurants.png')" alt="">
                    </figure>
                    <div class="info-plate-body px-4 pb-5 pt-1 text-center">
                        <p class="fs-4 m-0">Non ci sono ristoranti per questa categoria</p>
                    </div>
                </div>
                <!-- stampo tutte le card che contengono le info. dei ristoranti con la determinata tipologia  -->
                <div v-else>
                    <h5 class="">Hai scelto la categoria: <span class="badge rounded-pill bg-green_1 text-light"> {{ typeName }}</span></h5>
                    <div class="row">
                        <div class="cards-wrapper d-flex flex-wrap gap-3 justify-content-center mt-5 mb-5">
                            <ResturantTypeCard v-for="resturantType in resturantsType" :key="resturantType.user_id"
                                :resturantType="resturantType" />
                        </div>                
                    </div>
                <!-- {{ typeName }} -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ResturantTypeCard from '../components/ResturantTypeCard.vue'
import MyHeader from '../components/MyHeader.vue'

export default {

    components: {
        ResturantTypeCard,
        MyHeader,
    },

    data(){

        return{
            resturantsType: [],
            typeName: '',
        }
    },

    methods: {
        fetchResturantsType() {
            //faccio una chiamata API passando come parametro l'id della tipologia cliccata
            axios.get(`/api/resturant-type/${ this.$route.params.id }`)
            .then( res => {
                //salvo i dati della chiamata nell'array
                this.resturantsType = res.data.users;
                this.typeName = this.resturantsType[0].type_name;
                console.log(res);
            })
            .catch( err => {
                console.warn(err);
            })
        }
    },

    mounted() {
        this.fetchResturantsType();
    }
}
</script>

<style lang="scss" scoped>
.bg-green_1{
    background-color: #00ccbc;
}

.page-wrapper{
    min-height: calc(100vh - 455px);
}

.info-card{
    position: relative;
    border-radius: 10px;
    max-width: 500px;
    width: 85%;
    max-height: 75vh;
    background-color: white;
    overflow: hidden;
    box-shadow: 0px 0px 20px 3px #cdcdcde3;;

    .info-img{
        width: 100%;
        height: 280px;
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 87%);
        overflow: hidden;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    }
}
</style>