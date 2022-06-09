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
        }
    }
}
</script>

<style lang="scss" scoped>

</style>