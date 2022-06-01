<template>
    <div>
        <section id="resturant-info">
            <div class="constainer-fluid main-image">
                <figure>
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
        <section id="resturant-menu">
            <div class="container pt-5">
                <h3>Ecco il nostro menù</h3>
                <!-- ciclo il componente MenuCard per stampare tutti i piatti  -->
                <div class="cards-wrapper row justify-content-center">
                    <MenuCard v-for="(menuPlate,index) in menuPlates" :key="index"
                        :menuPlate="menuPlate" />
                </div>
            </div>
        </section>
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
                console.log(this.menuPlates)
            })
            .catch( err => {
                console.warn(err);
            })
        }
    },
    mounted() {
        this.fetchResturantInfo();
    },
}
</script>

<style lang="scss" scoped>
    figure{
        height: 385px;
        width: 100%;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    }
</style>