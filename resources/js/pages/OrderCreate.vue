<template>
    <div>
        <MyHeader/>
        <div class="container py-5 px-3">

            <!-- Row 1 checkout cart -->
            <div class="row">


                <!-- Dati utente -->
                <div class="col-12 col-md-6">
                    <ValidationObserver v-slot="{handleSubmit}">

                        <form @submit.prevent="handleSubmit(onSubmit())" methods="post">
                            <!-- Guest name -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_name" rules="required|min:3|max:150|alpha_spaces" v-slot="{ errors }">
                                    <label class="col-form-label fs-5" for="guest_name">Nome</label>
                                    <input v-model="form.guest_name" type="text" class="form-control" :class="form.guest_name.length == 0 ? 'is-invalid' : 'is-valid' && errors.length ? 'is-invalid' : 'is-valid'" id="guest_name" name="guest_name" value="" placeholder="Inserisci il tuo nome">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest surname -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_surname" rules="required|min:3|max:150|alpha_spaces" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_surname">Cognome</label>
                                    <input v-model="form.guest_surname" type="text" class="form-control" :class="errors.length ? 'is-invalid' : 'is-valid' && form.guest_surname.length == 0 ? 'is-invalid' : 'is-valid' " id="guest_surname" name="guest_surname" value="" placeholder="Inserisci il tuo cognome">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest email -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_email" rules="required|email|max:255" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_email">Email</label>
                                    <input v-model="form.guest_email" type="text" class="form-control" :class="form.guest_email.length == 0 ? 'is-invalid' : 'is-valid' && errors.length ? 'is-invalid' : 'is-valid'" id="guest_email" name="guest_email" value="" placeholder="Inserisci la tua e-mail">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest city -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_city" rules="required|min:3|max:150|alpha_spaces" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_city">Città</label>
                                    <input v-model="form.guest_city" type="text" class="form-control" :class="errors.length ? 'is-invalid' : 'is-valid' && form.guest_city.length == 0 ? 'is-invalid' : 'is-valid' " id="guest_city" name="guest_city" value="" placeholder="Inserisci la tua città">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest cap -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_cap" rules="required|min:5|max:5|numeric" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_cap">CAP</label>
                                    <input v-model="form.guest_cap" type="text" class="form-control" :class="errors.length ? 'is-invalid' : 'is-valid' && form.guest_cap.length == 0 ? 'is-invalid' : 'is-valid' "  id="guest_cap" name="guest_cap" value="" placeholder="Inserisci il CAP">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest address -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_adress" rules="required|min:3|max:255" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_adress">Indirizzo</label>
                                    <input v-model="form.guest_adress" type="text" class="form-control" :class="errors.length ? 'is-invalid' : 'is-valid' && form.guest_adress.length == 0 ? 'is-invalid' : 'is-valid' " id="guest_adress" name="guest_adress" value="" placeholder="Inserisci la via">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest phone -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_phone" rules="required|numeric|max:15" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_phone">Telefono</label>
                                    <input v-model="form.guest_phone" type="text" class="form-control" :class="errors.length ? 'is-invalid' : 'is-valid' && form.guest_phone.length == 0 ? 'is-invalid' : 'is-valid' " id="guest_phone" name="guest_phone" value="" placeholder="Inserisci il tuo numero di telefono">
                                    <div v-if="errors.length" class="w-100 font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Button submit -->
                            <div class="button d-flex align-items-center justify-content-between">
                                <button :disabled="cart.length ? false : true" type="submit" class="btn-green_1 btn pay-button">Vai al pagamento</button>
                                <router-link to="/city-resturants" class="text-reset text-decoration-none" v-if="cart.length == 0">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <span class="text-hover-purple">Vai alla lista dei ristoranti</span>
                                </router-link>
                            </div>
                        </form>
                    </ValidationObserver>
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

            // Form
            form: {
                guest_name: "",
                guest_surname: "",
                guest_email: "",
                guest_city: "",
                guest_cap: "",
                guest_adress: "",
                guest_phone: "",
            },
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

        // ELIMINO UN ELEMENTO DAL CARRELLO
        removeItemFromCart(plateId){
            this.cart = this.cart.filter(item => item.id  != plateId);
            localStorage.setItem("cart", JSON.stringify(this.cart));
            localStorage.setItem('total', this.getTotal());
        },

        // Invio form dati utente
        sendForm() {
            axios.post('/api/orders', {
                form: this.form,
                total: localStorage.getItem('total'),
                cart: this.cart,
            })
            .then( res => {
                const data = res.data;
                if(res.status == 200) {
                    localStorage.setItem('cart', '[]');
                    localStorage.setItem('total', 0);
                    this.cart = [];
                    window.location = '/checkout';
                }
            })
        },

        onSubmit() {
            this.sendForm();
            // console.log(this.form);
        }
    },
}
</script>

<style lang="scss" scoped>

</style>