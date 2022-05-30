<template>

    <div>
        <div class="container">
        <h3>Tipologie di ristoranti:</h3>
        <ul>
            <!-- stampo tutte le tipologie -->
            <router-link class="link" tag="li" :to="{ name: 'resturant-type', params: { id: type.id } }"            
                v-for="type in types" :key="type.id">
                {{ type.name }}
            </router-link>
        </ul>
    </div>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            types: []
        }
    },
    methods: {
        fetchTypes() {
            // faccio una chiamata axios per recuperare le tipologie
            axios.get('/api/home')
            .then( res => {
                //salvo i dati della chiamata nell'array
                this.types = res.data.typres;
                console.log(res.data.typres);
            })
            .catch( err => {
                console.warn(err);
            })
        }
    },
    mounted() {
        this.fetchTypes();
    }
}
</script>

<style lang="scss" scoped>
    .link{
        cursor: pointer;
    }
</style>