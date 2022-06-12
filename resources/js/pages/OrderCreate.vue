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
                            <validationProvider class="mb-3" name="guest_name" rules="required|min:3|max:150|alpha_spaces" v-slot="{ errors }">
                                <div class="form w-100">
                                    
                                    <input v-model="form.guest_name"
                                    type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'"
                                    value=""
                                    id="guest_name"
                                    name="guest_name"
                                    placeholder=" ">

                                    <label for="guest_name" class="form__label">Nome</label>

                                </div>
                                <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>


                            <!-- Guest surname -->
                            <validationProvider name="guest_surname" rules="required|min:3|max:150|alpha_spaces" v-slot="{errors}">
                                <div class="form w-100">

                                    <input v-model="form.guest_surname" type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'"
                                    value=""
                                    id="guest_surname" name="guest_surname" placeholder=" ">

                                    <label for="guest_surname" class="form__label">Cognome</label>

                                </div>
                                <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>


                            <!-- Guest email -->
                            <validationProvider name="guest_email" rules="required|email|max:255" v-slot="{errors}">
                                <div class="form w-100">

                                    <input v-model="form.guest_email" type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'" id="guest_email" name="guest_email"  placeholder=" ">

                                    <label for="guest_email" class="form__label">Email</label>

                                </div>
                                 <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>


                            <!-- Guest city -->
                            <validationProvider name="guest_city" rules="required|min:3|max:150|alpha_spaces" v-slot="{errors}">
                                <div class="form w-100">

                                    <input v-model="form.guest_city" type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'" id="guest_city" name="guest_city" placeholder=" ">

                                    <label for="guest_city" class="form__label">Città</label>

                                </div>
                                <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>


                            <!-- Guest cap -->
                            <validationProvider name="guest_cap" rules="required|min:5|max:5|numeric" v-slot="{errors}">
                                <div class="form w-100">

                                    <input v-model="form.guest_cap" type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'" id="guest_cap" name="guest_cap" placeholder=" ">

                                    <label for="guest_cap" class="form__label">CAP</label>

                                </div>
                                <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>

                            <!-- Guest address -->
                            <validationProvider name="guest_adress" rules="required|min:3|max:255" v-slot="{errors}">
                                <div class="form w-100">

                                    <input v-model="form.guest_adress" type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'"  id="guest_adress" name="guest_adress" placeholder=" ">

                                    <label for="guest_adress" class="form__label">Indirizzo</label>

                                </div>
                                <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>


                            <!-- Guest phone -->
                            <validationProvider name="guest_phone" rules="required|numeric|min:6|max:15" v-slot="{errors}">
                                <div class="form w-100">

                                    <input v-model="form.guest_phone" type="text"
                                    class="form__input" :class="form.guest_name.length == 0 ? 'form__invalid' : 'form__valid' && errors.length ? 'form__invalid' : 'form__valid'" id="guest_phone" name="guest_phone" placeholder=" ">

                                    <label for="guest_phone" class="form__label">Telefono</label>


                                </div>
                                <div class="w-100 font-bold py-1 px-2 del-danger rounded">
                                    {{ errors.length ? errors[0] : ''}}
                                </div>
                            </validationProvider>

                            <!-- Button submit -->
                            <div class="button d-flex align-items-center justify-content-between flex-wrap">
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

            // Errori server validazione form
            errorsServer: [],
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

        // Elimino tutti gli elementi dal carrello
        removeAllItemsFromCart(){
            this.cart = [];
            localStorage.setItem("cart", JSON.stringify(this.cart));
            localStorage.setItem('total', 0);
            // localStorage.removeItem("cart", JSON.stringify(this.cart));
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
            .catch( err => {
                const errorsServer = err.response.data.errors;
                this.errorsServer = errorsServer;
            })
        },

        // on submit form
        onSubmit() {
            this.sendForm();
            // console.log(this.form);
        }
    },
}
</script>

<style lang="scss" scoped>

</style>