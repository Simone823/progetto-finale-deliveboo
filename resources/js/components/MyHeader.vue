<template>
    <div>
        <nav id="navbar_guest" class="navbar navbar-expand-lg navbar-light">
            <div class="container-md">
                <!-- LOGO  -->
                <a class="ms-3 ms-md-0 navbar-brand" href="/">
                    <img id="header_logo_deliveboo" :src="logo" alt="Deliveboo">
                </a>

                <!-- cart e burger versione tablet - mobile -->
                <div class="me-3 cart-burger d-flex align-items-center gap-2">
                    <!-- cart -->
                    <div v-if="authUser == null" class="nav-item">
                        <a class="nav-link dropdown" href="">
                            <button :class="[ tot < 1 ? '' : 'px-3 d-flex align-items-center gap-3 dropdown-label','btn-standard btn-tr-white']">
                                <i class="fa-solid fa-cart-shopping"></i>  
                                <span :class="tot < 1 ? 'd-none' : 'd-block fs-6' ">{{ tot }}&euro;</span>    
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
                                    <a class="dropdown-item" href="/" @click.prevent="logout">
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
                            <a class="nav-link dropdown" href="/order/create">
                                <button :class="[ tot < 1 ? '' : 'px-md-1 px-lg-2 px-xl-4 d-flex align-items-center gap-3 dropdown-label','btn-standard btn-tr-white']">
                                    <i class="fa-solid fa-cart-shopping"></i>  
                                    <span :class="tot < 1 ? 'd-none' : 'd-block fs-6' "><span class="d-none d-lg-inline">Tot.</span> {{ tot }}&euro;</span>    
                                </button>
                                <ul v-if="tot > 0" class="dropdown-items">
                                    <li v-for="el in cart" :key="el.id"
                                    class="d-flex flex-row justify-content-between align-items-center gap-3">
                                        <span>X{{ el.quantity }}</span>
                                        <span>{{ el.name }}</span>
                                        <span>{{ el.price * el.quantity }}&euro;</span>
                                        <button class="btn btn-danger text-white delete-el" @click="removeItemFromCart(el.id)">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </li>
                                </ul>   
                                <ul v-else class="dropdown-items empty">
                                    <li class="d-flex justify-content-center">
                                        <figure class="empty-cart">
                                            <img :src="require('/public/img/shopping-cart.gif')" alt="">
                                        </figure>
                                    </li>
                                    <li class="text-center">
                                        <span class="empty-cart-text">Il carrello è vuoto</span>
                                    </li>
                                </ul>                  
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
                                    <a class="dropdown-item dropdown-item text-center" href="/" @click.prevent="logout">
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
    </div>
</template>

<script>

export default {

    data() {
        return {
            authUser: window.authUser,
            logo: require('/public/img/logo_white.svg'),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            cart: JSON.parse(localStorage.getItem('cart')),
            tot: localStorage.getItem('total'),
        }
            
    },

    methods: {
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
        getTotal(){
            let sumItem;
            let sum = 0;
            for(let i = 0; i < this.cart.length; i++){
                sumItem = this.cart[i].price * this.cart[i].quantity;
                sum += sumItem;  
            }
            return sum;
        },
        removeItemFromCart(plateId){
            this.cart = this.cart.filter(item => item.id  != plateId);
            localStorage.setItem("cart", JSON.stringify(this.cart));
            localStorage.setItem('total', this.getTotal());
        },
    }
}
</script>

<style lang="scss" scoped>

ul{
    list-style: none;
    margin-block-start: 0;
    margin-block-end: 0;
    padding-inline-start: 0;
}

.dropdown{
    position: relative;
}

.dropdown-label{
    cursor: pointer;
    width: 100%;
    display: block;
    box-sizing: border-box;
    transition: all 300ms;
}

.dropdown-items{
    background-color: white;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 13px;
    padding: 10px;
    opacity: 0;
    visibility: hidden;
    min-width: 100%;
    height: 0;
    position: absolute;
    top: 60px;
    right: 5px;
    transform-origin: top;
    transform: scaleY(0);
    transition: transform 300ms;

    &.empty{
        width: 150px;
    }

    li{
        border-top: 1px solid #3E235D;
        padding: 5px 0;

        &:first-child{
            border-top: none;
        }
    }
}

.dropdown:hover > .dropdown-items{
    opacity: 1;
    visibility: visible;
    height: unset;
    transform: scaleY(1) translateY(-9px);
}

.delete-el{
    width: 22px;
    height: 22px;
    position: relative;
    background-color: transparent;
    border: none;
    i{
        color: rgb(207, 0, 0);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        &:hover{
            color: rgb(234, 35, 35);
        }
    }
}

.empty-cart{
    width: 70px;
    img{
        object-fit: cover;
        object-position: center;
    }
}
.empty-cart-text{
    font-size: 12px;
}
</style>