<template>

    <div class="card col-12 col-md-4 col-lg-3 text-center">
        <figure class="post-card-img">
            <img :src="resturantType.business_image" alt="">
        </figure>
        <div class="post-card-body">
            <h3>{{ resturantType.business_name }}</h3>
            <div class="info-wrapper">
                <p>Di: {{ resturantType.name }} {{ resturantType.surname }}</p>
                <p>In: {{ resturantType.business_address }}</p>
            </div>
        </div>
        <div class="button-wrapper">
            <router-link tag="button" class="btn btn-green_1" :to="{ name: 'resturant-menu', params: { id: resturantType.user_id } }">
                View this Resturant
            </router-link>
        </div> 
    </div>

</template>

<script>
export default {
    //tramite props prendo le info dei singoli ristoranti
    props:{
        resturantType: {
            type: Object,
            required: false,
        }
    }
}
</script>

<style lang="scss" scoped>
    .card{
        border: 1px solid black;
        padding: 15px;
    }
</style>