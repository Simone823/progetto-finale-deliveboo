<template>
    <div>
        <MyHeader/>
        <div class="container">

            <!-- Row 1 checkout cart -->
            <div class="row">


                <!-- Dati utente -->
                <div class="col-12 col-md-6">
                    <ValidationObserver v-slot="{handleSubmit}">

                        <form @submit.prevent="handleSubmit(sendForm())" methods="post">
                            <!-- Guest name -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_name" rules="required|min:3|max:150" v-slot="{ errors }">
                                    <label class="col-form-label fs-5" for="guest_name">Nome</label>
                                    <input v-model="form.guest_name" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' " id="guest_name" name="guest_name" value="" placeholder="Inserisci il tuo nome">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest surname -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_surname" rules="required|min:3|max:150" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_surname">Cognome</label>
                                    <input v-model="form.guest_surname" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' " id="guest_surname" name="guest_name" value="" placeholder="Inserisci il tuo cognome">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest email -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_email" rules="required|email|max:255" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_email">Email</label>
                                    <input v-model="form.guest_email" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' " id="guest_email" name="guest_email" value="" placeholder="Inserisci la tua e-mail">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest city -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_city" rules="required|min:3|max:150" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_city">Città</label>
                                    <input v-model="form.guest_city" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' " id="guest_city" name="guest_city" value="" placeholder="Inserisci la tua città">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest cap -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_cap" rules="required|min:5|max:5|numeric" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_cap">CAP</label>
                                    <input v-model="form.guest_cap" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' "  id="guest_cap" name="guest_cap" value="" placeholder="Inserisci il CAP">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest address -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_adress" rules="required|min:3|max:255" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_adress">Indirizzo</label>
                                    <input v-model="form.guest_adress" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' " id="guest_adress" name="guest_adress" value="" placeholder="Inserisci la via">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
                            </div>

                            <!-- Guest phone -->
                            <div class="form-group">
                                <validationProvider class="d-flex align-items-center flex-column mb-3" name="guest_phone" rules="required|numeric|max:15" v-slot="{errors}">
                                    <label class="col-form-label fs-5" for="guest_phone">Telefono</label>
                                    <input v-model="form.guest_phone" type="text" class="form-control" :class="errors.length ? 'border-2 border-danger' : 'border-2 border-success' " id="guest_phone" name="guest_phone" value="" placeholder="Inserisci il tuo numero di telefono">
                                    <div v-if="errors.length" class="font-bold py-1 px-2 bg-danger text-white rounded">
                                        {{errors[0]}}
                                    </div>
                                </validationProvider>
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

                <div class="button">
                    <a href="/checkout" @click="onSubmit()" type="submit" class="btn btn-info">Vai al pagamento</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import MyHeader from '../components/MyHeader.vue';
// import useValidate from '@vee-validate';
// import {required} from '@vuelidate/validators';

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

        // Invio form dati utente
        sendForm() {
            axios.post('/api/orders', {
                form: this.form,
                total: localStorage.getItem('total'),
                cart: this.cart
            })
            .then( res => {
                const data = res.data;
                // console.log(res);
            })
        },

        onSubmit() {
            console.log(this.v$);
            // this.sendForm();
            // console.log(this.form);
            // localStorage.setItem('cart', []);
            // localStorage.setItem('total', 0);
        }
    },
}
</script>

<style lang="scss" scoped>

</style>