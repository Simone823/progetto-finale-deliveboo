<template>
    <div>
        <MyHeader/>
        <div class="container">

            <!-- Row 1 checkout cart -->
            <div class="row">


                <!-- Dati utente -->
                <div class="col-12 col-md-6">
                    <form action="">
                        <!-- Guest name -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Nome</label>
                            <input type="text" class="form-control" id="guest_name" name="guest_name" value="" placeholder="Inserisci il tuo nome">
                        </div>

                        <!-- Guest surname -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Cognome</label>
                            <input type="text" class="form-control" id="guest_surname" name="guest_name" value="" placeholder="Inserisci il tuo cognome">
                        </div>

                        <!-- Guest email -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Email</label>
                            <input type="text" class="form-control" id="guest_email" name="guest_email" value="" placeholder="Inserisci la tua e-mail">
                        </div>

                        <!-- Guest city -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Città</label>
                            <input type="text" class="form-control" id="guest_city" name="guest_city" value="" placeholder="Inserisci la tua città">
                        </div>

                        <!-- Guest cap -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">CAP</label>
                            <input type="text" class="form-control" id="guest_cap" name="guest_cap" value="" placeholder="Inserisci il CAP">
                        </div>

                        <!-- Guest address -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Indirizzo</label>
                            <input type="text" class="form-control" id="guest_address" name="guest_address" value="" placeholder="Inserisci la via">
                        </div>

                        <!-- Guest phone -->
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Telefono</label>
                            <input type="text" class="form-control" id="guest_phone" name="guest_phone" value="" placeholder="Inserisci il tuo numero di telefono">
                        </div>
                    </form>
                </div>


                <!-- Carrello -->
                <div v-if="cart" class="col-12 col-md-6">
                    <h3>Checkout</h3>
                    <div v-for="item in cart" :key="item.id" class="d-flex justify-content-start align-items-center py-4 gap-3">
                        <span>x{{ item.quantity }}</span><span class="item-name">{{ item.name }}</span>
                        <span class="flex-grow-1 fs-5">{{ item.price * item.quantity }}&euro;</span>
                        <button class="btn btn-danger text-white" @click="removeItemFromCart(item.id)">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-start align-items-center py-4 gap-3 tot-wrapper">
                        <span class="flex-grow-1 fs-5 tot-cart">Totale:</span>
                        <span class="fs-4">{{ getTotal() }}&euro;</span>
                        <button class="btn btn-danger text-white" @click="removeAllItemsFromCart()">
                            Clear Cart
                        </button>
                    </div>
                </div>

                <div class="button">
                    <a href="/checkout" class="btn btn-info">Vai al Pagamento</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import MyHeader from '../components/MyHeader.vue';

export default {
    components: {
        MyHeader,
    },

    data() {
        return {

            // Carrello localstorage
            cart: JSON.parse(localStorage.getItem('cart')),
        }
    },

    methods: {
        //TOTALE
        getTotal(){
            let sumItem;
            let sum = 0;
            for(let i = 0; i < this.cart.length; i++){
                sumItem = this.cart[i].price * this.cart[i].quantity;
                sum += sumItem;  
            }
            return sum;
        },
    },

    mounted() {
    }
}
</script>

<style lang="scss" scoped>

</style>