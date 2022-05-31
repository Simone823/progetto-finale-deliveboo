<template>
    <div class="container">
        <h1>Ristoranti a: ***</h1>
        <div class="row flex-column flex-md-row py-4">
            <aside class="col-12 col-md-3">
                <ul class="d-flex flex-row flex-md-column flex-wrap flex-md-nowrap gap-2 justify-content-center">
                        <li class="form-group form-check" v-for="type in types" :key="type.id">
                            <input type="checkbox" class="form-check-input" :value="type.id" :id="types-type.id">
                            <label class="form-check-label" :for="types-type.id">{{type.type_name}}</label>
                        </li>
                </ul>
            </aside>
            <div class="col-12 col-md-9">
                <div class="d-flex flex-wrap gap-3 px-4 px-md-0">
                    <div class="card col-12 col-md-4 col-lg-3 text-center" 
                        v-for="resturant in resturants" :key="resturant.id">
                        <figure class="post-card-img">
                            <img :src="resturant.business_image" alt="">
                        </figure>
                        <div class="post-card-body">
                            <h3>{{ resturant.business_name }}</h3>
                            <div class="info-wrapper">
                                <p>Di: {{ resturant.name }} {{ resturant.surname }}</p>
                                <p>In: {{ resturant.business_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    data() {
        return{
            resturants: [],
            types: [],
        }
    },

    methods: {
        fetchCityResturants(){
            // faccio una chiamata axios per recuperare i ristoranti
            axios.get('/api/city-resturants')
            .then( res => {
                console.log(res);
                this.resturants = res.data.users;
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

</style>