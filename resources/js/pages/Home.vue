<template>

    <div>
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="address" class-form-label>Inserisci il tuo indirizzo per trovare ristoranti nei dintorni</label>
                    <div class="d-flex align-items-start gap-2">
                        <div class="d-flex flex-column flex-grow-1">
                            <input class="address form-control" v-model="inputAddress" type="text" id="address" name="address" placeholder="Inserisci il tuo indirizzo completo">
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <!-- TODO disabilitare il bottone -->
                        <router-link tag="button" :to="inputAddress != '' ? '/city-resturants' : '/' "
                            class="btn btn-green_1">
                                Cerca
                        </router-link>
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
            types: [],
            inputAddress: '',
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
        },
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