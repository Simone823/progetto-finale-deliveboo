<template>
    <div>
        <MyHeader />
        <div class="container">
            <div class="row pt-5 pb-5">
                 <!-- faccio un controllo per vedere se l'array contiene ristoranti -->
                <div v-if="resturantsType.length == 0">
                    <p>Per questa tipologia non ci sono ristoranti</p>
                </div>
                <!-- stampo tutte le card che contengono le info. dei ristoranti con la determinata tipologia  -->
                <div v-else>
                    <h1 class="fw-bold fs-1">{{ typeName }}</h1>
                    <div class="row">
                        <div class="cards-wrapper d-flex flex-wrap gap-3 justify-content-center">
                            <ResturantTypeCard v-for="resturantType in resturantsType" :key="resturantType.user_id"
                                :resturantType="resturantType" />
                        </div>                
                    </div>
                
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
// .height{
//     padding: 50px 0;
// }
</style>