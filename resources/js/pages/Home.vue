<template>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="address">Inserisci il tuo indirizzo per trovare ristoranti nei dintorni</label>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-control flex-grow-1" type="text" id="address" name="address" placeholder="Inserisci il tuo indirizzo completo">
                        <button class="btn btn-green_1">Cerca</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <h3>Tipologie di ristoranti:</h3>
        <ul>
            <!-- stampo tutte le tipologie -->
            <router-link class="link" tag="li" :to="{ name: 'resturant-type', params: { id: type.id } }"            
                v-for="type in types" :key="type.id">
                {{ type.type_name }}
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