<template>

    <div>
        <MyHeader />
        <!-- Jumbotron -->
       <MyJumbotron class="pb-4 "/>
        <!-- MySelection -->
        <MySelection class="pb-4 pt-4"/>
        <!-- Sezione Piatti -->
       <section class="bg-pink pb-4">
            <div class="container">
                <!-- Title -->
                <h3 class="fw-bold fs-1 pb-4 pt-4">I tuoi piatti preferiti, consegnati da noi.</h3>

                <div class="row">
                    <!-- Lists types -->
                    <ul class="lists_types d-flex flex-wrap">
                        <li v-for="type in types" :key="type.id" class="col-12 col-md-4 col-sm-6 px-3">

                            <router-link class="wrapper_card" tag="li" :to="{ name: 'resturant-type', params: { id: type.id } }">
                                <!-- Type image -->
                                <figure class="types_img">
                                    <img :src="`storage/${type.type_image}`" alt="">
                                    <!-- <img src="https://blog.cookaround.com/gildabias/wp-content/uploads/2021/01/Sushi-3.jpg" alt=""> -->
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
       </section>
       <!-- MyOther -->
        <MyOther class="pb-5 pt-5"/>
       <!-- MyNews -->
       <MyNews class="pb-4 pt-4"/>
    </div>
    
</template>

<script>

import MyJumbotron from '../components/MyJumbotron.vue';
import MySelection from '../components/MySelection.vue';
import MyOther from '../components/MyOther.vue';
import MyNews from '../components/MyNews.vue';
import MyHeader from '../components/MyHeader.vue'

export default {

    components: {
        MyJumbotron,
        MySelection,
        MyOther,
        MyNews,
        MyHeader,
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

    .bg-pink{
        background-color: #ffeae4;
    }

    .lists_types {
        list-style: none;
        padding: 0;
        row-gap: 25px;

        li {

            .wrapper_card {
                height: 175px;
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
                    background-color: rgba(0, 0, 0, 0.1);
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
                        filter: drop-shadow(2px 0px 11px #000000);
                    }
                }
            }

        }

    }

</style>