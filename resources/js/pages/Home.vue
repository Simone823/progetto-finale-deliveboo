<template>

    <div>
       <MyJumbotron class="mb-4"/>
        <div class="container">

            <!-- Title -->
            <h3 class="fw-bold fs-1 mb-4">La selezione di Deliveboo</h3>

            <div class="row">
                <!-- Lists types -->
                <ul class="lists_types d-flex flex-wrap">
                    <li v-for="type in types" :key="type.id" class="col-12 col-sm-6 px-3">

                        <router-link class="wrapper_card" tag="li" :to="{ name: 'resturant-type', params: { id: type.id } }">
                            <!-- Type image -->
                            <figure class="types_img">
                                <img src="https://www.sosushiandsound.it/wp-content/uploads/2021/11/all-you-can-eat-milano.jpg" alt="">
                            </figure>

                            <!-- Name type -->
                            <div class="type_name">
                                <h2>{{type.type_name}}</h2>
                            </div>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</template>

<script>

import MyJumbotron from '../components/MyJumbotron.vue';

export default {

    components: {
        MyJumbotron
    },

    data() {
        return {
            types: [],
        }
    },
    methods: {
        fetchTypes() {

            // faccio una chiamata axios per recuperare le tipologie
            axios.get('/api/home')
            .then( res => {

                //salvo i dati della chiamata nell'array
                this.types = res.data.typres;
                // console.log(this.types);
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

    .lists_types {
        list-style: none;
        padding: 0;
        row-gap: 25px;

        li {

            .wrapper_card {
                height: 300px;
                position: relative;
                cursor: pointer;
                border-radius: 5px;
                overflow: hidden;

                &::after {
                    content: '';
                    display: block;
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: rgba(0, 0, 0, 0.5);
                }

                &:hover {

                    .types_img {
                        overflow: hidden;

                        img {
                            transform: scale(1.07);
                            transition: transform 300ms linear;
                        }
                    }
                }

                .types_img {
                    width: 100%;
                    height: 100%;
                    opacity: 0.6;
            
                    img {
                        width: 100%;
                        height: 100%;
                        display: block;
                        object-fit: cover;
                        object-position: center;
                    }
                }

                .type_name {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    z-index: 1;
                    transform: translateY(-50%) translateX(-50%);

                    h2 {
                        font-weight: 700;
                        color: white;
                    }
                }
            }

        }

    }

</style>