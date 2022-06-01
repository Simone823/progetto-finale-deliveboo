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
                <div class="row">
                    <div class="col">
                        qui andranno i piatti del menù
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            resturant: [],
        }
    },
    methods: {
        fetchResturantInfo(){
            axios.get(`/api/resturant-menu/${this.$route.params.id}`)
            .then( res => {
                console.log(res);
                this.resturant = res.data.user[0];
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