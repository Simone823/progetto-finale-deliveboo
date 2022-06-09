<template>
    <div>
        <!-- navbar customizzata  -->
        <nav id="navbar_guest" class="navbar navbar-expand-lg navbar-light pb-0 pb-md-2">
            <div class="container-custom px-2 px-md-4 px-lg-5  d-flex justify-content-between align-items-center flex-wrap">
                <!-- LOGO  -->
                <a class="ms-3 ms-md-0 navbar-brand" href="/">
                    <img id="header_logo_deliveboo" :src="logo" alt="Deliveboo">
                </a>

                <!-- cart e burger versione tablet - mobile -->
                <div class="me-3 cart-burger d-flex align-items-center gap-2">
                    <!-- cart -->
                    <div v-if="authUser == null" class="nav-item">
                        <a class="nav-link" href="#">
                            <button class="btn-standard btn-white opacity-100">
                                <i class="icon-color fa-solid fa-cart-shopping"></i>                          
                            </button>
                        </a>
                    </div>  
        
                    <!-- BURGER ICON -->
                    <div id="burger-icon" class="d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <label for="check">
                            <input type="checkbox" id="check"/> 
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>        
                    </div>
                </div>
                <!-- MENU ESTESO -->
                <div class="d-none d-md-flex justify-content-end">
                    <ul class="navbar-nav flex-md-row gap-2 align-items-center">                            
                        <!-- Dropdown logout -->
                        <li v-if="authUser != null" class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <button class="btn-standard btn-white">
                                    <i class="icon-color me-2 fa-solid fa-caret-down"></i>
                                    {{ authUser.business_name }}
                                </button>
                            </a>
                                
                            <!-- Drop item -->
                            <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/admin/homepage">
                                        <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                        Dashboard
                                    </a>
                                </li>
                                    
                                <li>
                                    <a class="dropdown-item" href="/home" @click.prevent="logout">
                                        <i class="icon-color me-2 fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </a>    
                                </li>
                            </ul>
                        </li>
                                
                        <li v-if="authUser == null" class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <button class="btn-standard btn-white">
                                    <i class="icon-color me-2 fa-solid fa-caret-down"></i>
                                    Collabora con noi
                                </button>
                            </a>

                            <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                        Ristoranti
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="icon-color me-2 fa-solid fa-briefcase"></i>
                                        Lavora con noi
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="icon-color me-2 fa-solid fa-building"></i>
                                        Deliveroo for Work
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li v-if="authUser == null" class="nav-item">
                            <a class="nav-link" href="/login">
                                <button class="btn-standard btn-white">
                                    <i class="icon-color me-2 fa-solid fa-home"></i>
                                    Accedi          
                                </button>
                            </a>
                        </li>
                        <li v-if="authUser == null" class="nav-item">
                            <a class="nav-link" href="/register">
                                <button class="btn-standard btn-white">
                                    Diventa nostro partner     
                                </button>
                            </a>
                        </li>
                        <!-- cart -->
                        <li v-if="authUser == null" class="nav-item">
                            <a class="nav-link" href="">
                                <button class="btn-standard btn-tr-white">
                                    <i class="fa-solid fa-cart-shopping"></i>                          
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- MENU BURGER -->
                <div class="nav-burger collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Dropdown logout -->
                        <li v-if="authUser != null" class="nav-item text-center dropdown bg-purple">
                            <a class="nav-link text-reset" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ authUser.business_name }}
                                <i class="ms-2 fa-solid fa-caret-down"></i>
                            </a>
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item text-center" href="/admin/homepage">
                                        <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item dropdown-item text-center" href="/home" @click.prevent="logout">
                                        <i class="icon-color me-2 fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </a>    
                                </li>
                            </ul>
                        </li>

                        <li v-if="authUser == null" class="nav-item text-center dropdown bg-purple">
                            <a class="nav-link text-reset" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Collabora con noi
                                <i class="ms-2 fa-solid fa-caret-down"></i>
                            </a>
                
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item text-center" href="#">
                                        <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                        Ristoranti
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center" href="#">
                                        <i class="icon-color me-2 fa-solid fa-briefcase"></i>
                                        Lavora con noi
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center" href="#">
                                        <i class="icon-color me-2 fa-solid fa-building"></i>
                                        Deliveroo for Work
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li v-if="authUser == null" class="nav-item bg-orange">
                            <a class="nav-link text-center text-reset" href="/login">
                                Accedi
                            </a>
                        </li>
                        <li v-if="authUser == null" class="nav-item bg-violet">
                            <a class="nav-link text-center text-reset" href="/register">
                                Diventa nostro partner     
                            </a>
                        </li>
                    
                    </ul>
                </div>  
            </div>
        </nav>

        <main>
            <!-- sezioni che contiene le info del ristorante selezionato -->
            <section id="resturant-info">
                <!-- container che contiene l'immagine del ristorante e le sue info principale  -->
                <div class="container-custom row p-0 p-sm-3 p-md-4 px-lg-5 flex-wrap">
                    <figure class="resturant-img col-12 col-sm-5 col-md-4 m-0 p-0">
                        <!-- TODO aggiungere immagine -->
                        <img v-if="resturant.business_image" :src="`/storage/${resturant.business_image}`" alt="">
                        <img v-else :src="require('/public/img/placeholder_restaurants.png')" alt="">
                    </figure>
                    <!-- info ristorante prese dal DB  -->
                    <div class="resturant-details col-12 col-sm-7 col-md-4 flex-grow-1 p-3 p-md-0 px-md-3 px-lg-4">
                        <h1 class="resturant-name">{{ resturant.business_name }}</h1>
                        <p class="m-0 fs-5"><i class="fa-solid fa-user me-3 fs-6"></i>Di {{ `${ resturant.name + ' ' + resturant.surname }` }}</p>
                        <p class="m-0 fs-6"><i class="fa-solid fa-location-dot me-3 fs-6"></i>In {{ `${ resturant.business_address + ' (' + resturant.business_city + ') '}` }}</p>
                        <span class="fs-6"><i class="fa-solid fa-circle-info me-3 fs-6"></i>CAP: {{resturant.business_cap}} / P.Iva: {{resturant.p_iva }}</span>
                        <span class="d-block fs-6"><i class="fa-solid fa-address-book me-3 fs-6"></i>Email: {{ resturant.email }}</span>
                    </div>
                </div>
            </section>

            <!-- sezione che contiene il menù del ristorante -->
            <section id="resturant-menu" class="pt-4">
                <div class="container-custom px-3 px-md-4 px-lg-5 py-2 py-sm-2 py-md-4 row">

                    <!-- Menu piatti wrapper -->
                    <div class="col-12 col-md-6 col-lg-8 col-xxxl-10">
                        <h3 class="mb-3 fs-2 fw-bold">Il nostro menù</h3>
                        <!-- ciclo il componente MenuCard per stampare tutti i piatti  -->
                        <div class="cards-wrapper row justify-content-start">
                            <div class="card-menu col-12 col-lg-6 col-xxl-5 col-xxxl-4 gap-2 mb-4 flex-grow-1"
                                v-for="(menuPlate,index) in menuPlates" :key="index"
                                v-on:click="viewPlate(index)">
                                <div class="card-wrapper p-3 d-flex justify-content-between">
                                    <div class="card-body flex-grow-1 p-0">
                                        <h5 class="card-title fw-bold mb-3">{{ menuPlate.name }}</h5>
                                        <span class="fs-5">{{ menuPlate.price }}&euro;</span>
                                    </div>
                                    <div class="align-self-center justify-content-center">
                                        <figure class="post-card-img m-0">
                                            <!-- TODO inserire immagine -->
                                            <img v-if="menuPlate.image" :src="`/storage/${menuPlate.image}`" alt="">
                                            <img v-else :src="require('/public/img/placeholder_plate.png')" alt="">
                                        </figure>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARRELLO  -->
                    <div class="cart-component col-12 col-md-6 col-lg-4 col-xxxl-2 align-self-start p-4">       
                        <!-- se l'array carrello è vuoto... -->
                        <div v-if="cart.length == 0" class="text-center">
                            Il carrello è vuoto
                        </div>
                        <!-- se l'array carrello contiene elementi li mostra  -->
                        <div v-else>
                            <h3>Il tuo ordine</h3>
                            <div v-for="item in cart" :key="item.id"
                                class="d-flex justify-content-start align-items-center py-4 gap-3">
                                <!-- <figure>
                                    <img :src="item.image" alt="">
                                </figure> -->
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
                        <div>
                            <!-- TODO aggiungere braintree per il checkput -->
                            <button :disabled="cart.length == 0 ? true : false" :class="[cart.length == 0 ? 'disabled' : 'btn-green_1', 'btn pay-button']">
                                Vai al pagamento
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!--INFO PIATTO - gestione del componente(piatto) attivo -->
            <div :class=" [activeElement != undefined ? 'active' : '','info-wrapper d-flex justify-content-center align-items-center'] ">
                <!-- se l'id degli elementi nel carrello non corrispondono all'id del ristorante visualizzato  -->
                <div v-if="cart.length > 0 && resturant.id !== cart[0].user_id" 
                    :class=" [ activeElement != undefined ? 'active' : '','add-cart-error'] ">
                    <button class="close-info d-flex justify-content-center align-items-center" @click="closePlateInfo()">X</button>
                    <p>Non puoi fare acquisti da ristoranti diversi!</p>
                </div>
                <!-- se gli id corrispondono sarà possibile aggiungere i piatti al carrello  -->
                <div v-else
                    :class=" [ activeElement != undefined && activeElement == index ? 'active' : '','info-plate-card'] "
                    v-for="(menuPlate,index) in menuPlates" :key="index">
                    <button class="close-info d-flex justify-content-center align-items-center" @click="closePlateInfo()">X</button>
                    <figure class="info-plate-img">
                        <img v-if="menuPlate.image" :src="`/storage/${menuPlate.image}`" alt="">
                        <img v-else :src="require('/public/img/placeholder_plate.png')" alt="">
                    </figure>

                    <!-- card body  -->
                    <div class="info-plate-body p-5">
                        <h1>{{ menuPlate.name }}</h1>
                        <div class="info-plate-ingredients py-5">
                            <span>Ingredienti:</span>
                            <ul>
                                <li v-for="(ingredient,index) in ingredients" :key="index">
                                    {{ ingredient }}
                                </li>
                            </ul>
                        </div>

                        <!-- card footer  -->
                        <div class="cart-management">
                            <div class="plates-number d-flex justify-content-center align-items-center gap-5 py-5">
                                <!-- diminuisci la quantità -->
                                <button :disabled="menuPlate.quantity < 1 ? true : false" :class="[menuPlate.quantity < 1 ? 'disabled' : '', 'minus-button quantity-buttons']" @click="menuPlate.quantity > 0 ? menuPlate.quantity-- : menuPlate.quantity = 0">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <span class="fs-4">{{ menuPlate.quantity }}</span>
                                <!-- aumenta la quantità -->
                                <button class="plus-button quantity-buttons" @click="menuPlate.quantity++">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <!-- TODO gestire il prezzo dinamicamente  -->
                            <div class="add-cart d-flex justify-content-center">
                                <button :disabled="menuPlate.quantity < 1 ? true : false" :class="[menuPlate.quantity < 1 ? 'disabled' : 'btn-green_1', 'btn py-2 px-5']" @click="addItemToCart(menuPlate.id); updateQuantity(menuPlate.id, menuPlate.quantity); closePlateInfo()">Aggiungi per {{menuPlate.price * menuPlate.quantity}}&euro;</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
        
    </div>
</template>

<script>

export default {

    data() {
        return {
            // per la gestione del logout nella navbar
            authUser: window.authUser,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            // --
            activeElement: undefined,
            resturant: [],
            menuPlates: [],
            ingredients: [],
            logo: require('/public/img/logo_white.svg'),
            // variabili per carrello
            plates: '',
            cart: JSON.parse(localStorage.getItem("cart")),
        }
    },
    methods: {
        // LOGOUT
        logout:function(){
            axios.post('logout').then(response => {
                if (response.status === 302 || 401) {
                    // console.log('logout');
                    window.location.reload();
                }
                else {
                // throw error and go to catch block
                }
            }).catch(error => {
                console.log(error);
            });
        },
        //chiamata che ritorna il ristorante specifico, e il menù del ristorante
        fetchResturantInfo(){
            axios.get(`/api/resturant-menu/${this.$route.params.id}`)
            .then( res => {
                // console.log(res);
                this.resturant = res.data.user[0];
                this.menuPlates = res.data.user_plates;
                localStorage.setItem("plates", JSON.stringify(res.data.user_plates));
                if(!localStorage.getItem("cart")){
                    localStorage.setItem("cart","[]");
                } else if(!localStorage.getItem('total')) {
                    localStorage.setItem('total', 0);
                }
                this.plates = JSON.parse(localStorage.getItem("plates"));
            })
            .catch( err => {
                console.warn(err);
            })
        },
        // a questa funzione viene passato come parametro l'indice del piatto cliccato, '
        // ed assegna all'array ingredients i corrispettivi ingredienti
        viewPlate(i){
            this.activeElement = i;
            this.ingredients = this.menuPlates[i].ingredients.split(',');
            this.counter = 0
        },
        closePlateInfo(){
            this.activeElement = undefined;
        },
        // methods per carrello 
        // AGGIUNGO UN ELEMENTO AL CARRELLO
        addItemToCart(plateId){
            let plate = this.plates.find(function(plate){
                return plate.id == plateId;
            });

            if(this.cart.length == 0){
                this.cart.push(plate);
            }else{
                let res = this.cart.find(element => element.id == plateId);
                if(res === undefined){
                    this.cart.push(plate);
                }
            }

            localStorage.setItem("cart", JSON.stringify(this.cart));
        },
        // ELIMINO UN ELEMENTO DAL CARRELLO
        removeItemFromCart(plateId){
            this.cart = this.cart.filter(item => item.id  != plateId);
            localStorage.setItem("cart", JSON.stringify(this.cart));
            // window.location.reload();
        },
        removeAllItemsFromCart(){
            this.cart = [];
            localStorage.setItem("cart", JSON.stringify(this.cart));
            // localStorage.removeItem("cart", JSON.stringify(this.cart));
        },
        // QUANTITÀ DEL PRODOTTO
        updateQuantity(plateId, quantity){
            for(let plate of this.cart){
                if(plate.id == plateId){
                    plate.quantity = quantity;
                }
            }
            localStorage.setItem("cart", JSON.stringify(this.cart));
        },
        //TOTALE
        getTotal(){
            let sumItem; //somma dello stesso prodotto ripetuto
            let sum = 0;
            for(let i = 0; i < this.cart.length; i++){
                sumItem = this.cart[i].price * this.cart[i].quantity;
                sum += sumItem;  //somma totale
            }
            localStorage.setItem('total', sum);
            return sum;
        },
    },

    mounted() {
        this.fetchResturantInfo();
        // localStorage.removeItem("cart", JSON.stringify(this.cart));        
    },
}
</script>

<style lang="scss" scoped>

    nav > .container-custom{
        width: 2048px;
    }

    .container-custom{
        max-width: 2048px;
        margin: 0 auto;

        .cards-wrapper {
            height: 550px;
            overflow-y: auto;
        }
    }

    #resturant-info{
        border-bottom: 1px solid #cacaca63;
        box-shadow: 0px 4px 10px #cacaca63;
        position: relative;
        z-index: 10;

            .fa-solid{
                color: #b0b0b0;
            }

    }

    #resturant-menu{
        background-color: #f9fafa;
    }

    .resturant-name{
        font-size: 40px;
        font-weight: 700;
    }

    .resturant-img{
        height: 350px;
        border-radius: 5px;
        overflow: hidden;
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        @media only screen and (max-width:574px){
            border-radius:0px;
        }
    }

    .card-wrapper{
        cursor: pointer;
        border-radius: 3px;
        overflow: hidden;
        background-color: white;
        height: 132px;
        box-shadow: 0px 0px 5px 0px #b5b5b563;

        &:hover{
            box-shadow: 0px 12px 17px 10px rgb(181 181 181 / 39%);
            transition: all 300ms;
        }

        &:hover img{
            transform: scale(1.1,1.1);
            transition: all 500ms;
        }

        .post-card-img{
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 3px;
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
        }
    }

    .info-wrapper{
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: -1;
        display: none;
    }

    .info-wrapper.active{
        z-index: 999;

        &::after{
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.552);
            z-index: 0;
            animation: bkc 300ms linear 1;
        }

        @keyframes bkc{
            from{
                background-color: transparent;
            }
            to{
                background-color: rgba(0, 0, 0, 0.552);
            }
        }
    }

    .add-cart-error{
        padding: 30px 15px;
    }

    .info-plate-card, .add-cart-error{
        display: none;
        position: relative;
        border-radius: 8px;
        max-width: 560px;
        width: 90%;
        max-height: 75vh;
        background-color: white;
        overflow: hidden;
        z-index: 9999;
        overflow-y: auto;

        .close-info{
            position: absolute;
            top: 1vh;
            right: 1vh;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            background-color: white;
            color: #00CCBC;
            font-size: 18px;
            font-weight: 600;
            opacity: 0.65;

            &:hover{
                opacity: 1;
                transition: all 300ms;
            }
        }

        .info-plate-img{
            width: 100%;
            height: 320px;
            overflow: hidden;
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
        }

        .info-plate-body{
            padding: 25px 20px;
        }
    }

        .info-plate-card.active, .add-cart-error.active{
            display: block;
            animation: zoom 300ms linear 1;
        }

        @keyframes zoom{
            from{
                transform: scale(0.3, 0.3);
            }
            to{
                transform: scale(1, 1);
            }
        }

        .info-plate-ingredients{
            border-bottom: 1px solid rgb(209, 209, 209);
        }

    .cart-component{
        background-color: white;
        border: 1px solid #cacaca63;
        border-radius: 5px;
        min-height: 60px;
    }

    .quantity-buttons{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-size: 18px;
        color: #00CCBC;
        border: 2px solid #00CCBC;
        background-color: white;

        &.disabled{
            color: #b0b0b0;
            border: 2px solid #b0b0b0;
            opacity: 0.5;
            background-color: white;
        }
    }

    .pay-button{
        width: 100%;
        padding: 10px 10px;
        font-size: 16px;
        font-weight: 600;
    }

    .item-name{
        font-size: 18px;
        color: rgba(0, 0, 0, 0.6);
        font-weight: 500;
    }

    .tot-cart{
        font-size: 16px;
        color: rgba(0, 0, 0, 0.8);
        font-weight: 600;
    }
    .tot-wrapper{
        border-top: 1px solid #cacaca63;
    }

    .disabled{
        background-color: #b0b0b0;
        opacity: 0.5;
    }

    @media screen and (min-width: 2150px){
        .col-xxxl-2{
            width: 30%;
        }
        .col-xxxl-10{
            width: 70%;
        }
        .col-xxxl-4{
            width: 33.33333%;
        }
    }
</style>