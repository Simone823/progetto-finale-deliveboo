<template>
    <div class="container">
        <!-- faccio un controllo per vedere se l'array contiene ristoranti -->
        <div v-if="resturantsType.length == 0">
            <p>Per questa tipologia non è presente nessun ristorante.</p>
        </div>
        <!-- stampo tutte le card che contengono le info. dei ristoranti con la determinata tipologia  -->
        <div v-else class="cards-wrapper d-flex flex-wrap gap-3 justify-content-center">
            <ResturantTypeCard v-for="resturantType in resturantsType" :key="resturantType.user_id"
                :resturantType="resturantType" />
        </div>
    </div>
</template>

<script>
import ResturantTypeCard from '../components/ResturantTypeCard.vue'

export default {

    components: {
        ResturantTypeCard,
    },

    data(){
        return{
            resturantsType: [],
        }
    },

    methods: {
        fetchResturantsType() {
            //faccio una chiamata API passando come parametro l'id della tipologia cliccata
            axios.get(`/api/resturant-type/${ this.$route.params.id }`)
            .then( res => {
                //salvo i dati della chiamata nell'array
                this.resturantsType = res.data.users;
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

</style>