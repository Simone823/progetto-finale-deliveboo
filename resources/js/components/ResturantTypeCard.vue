<template>
<!-- :src="resturantType.business_image" -->
    <div class="card col-12 col-md-4 col-lg-3 p-0 ms-4 me-4" style="width: 18rem;">
        <img v-if="resturantType.business_image" :src="`/storage/${resturantType.business_image}`" class="card-img-top" alt="...">
            <img v-else :src="require('/public/img/placeholder_restaurants.png')" alt="">
            <div class="card-body">
                <h5 class="card-title fs-5 mt-1 mb-1">{{ resturantType.business_name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ resturantType.name }} {{ resturantType.surname }}</li>
                <li class="list-group-item">{{ resturantType.business_address }}</li>
            </ul>
            <div class="card-body">
                <router-link tag="button" class="btn btn-green_1 mt-2 mb-2" :to="{ name: 'resturant-menu', params: { id: resturantType.user_id } }">
                    Vai al ristorante
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
        filter: drop-shadow(0px 0px 8px rgba( #000000,0.2));
    }
</style>