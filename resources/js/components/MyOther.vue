<template>
    <section>
        <div class="container">
            <h1 class="fw-bold fs-1 mb-4">Cerchi qualcos'altro?</h1>
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <a href="#" v-for="type in types" :key="type.id"><span class="other_item">{{type}}</span></a>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'MyOther',
        data(){
            return{
                types: [
                    'Halal',
                    'Colazione',
                    'Vegetariano',
                    'Messicano',
                    'Dessert',
                    'Indiano',
                    'Greco',
                    'Giapponese',
                    'Cinese',
                    'Libanese',
                    'Americano',
                    'Italiano',
                    'Thailandese',
                    'Sushi',
                ]
            }
        }
    }
</script>

<style lang="scss" scoped>
    a{
        text-decoration: none;
    }
    .other_item{
        padding: 10px;
        background-color: #F9FAFA;
        color: #131313;
        font-size: 1.5rem;
        font-weight: 700;
        border-radius: 5px;
    }
</style>