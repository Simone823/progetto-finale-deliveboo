import Vue from 'vue';
// importo l'istanza router esportata da index.js 
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/Home.vue';
import ResturantType from '../pages/ResturantType.vue';
import CityResturants from '../pages/CityResturants.vue';
import ResturantMenu from '../pages/ResturantMenu.vue';
<<<<<<< HEAD
import NotFound from '../pages/404.vue';

=======
import OrderCreate from '../pages/OrderCreate.vue';
>>>>>>> stripe-prova-2
//faccio un array che conterrà le rotte
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/resturant-type/:id',
        name: 'resturant-type',
        component: ResturantType,
    },
    {
        path: '/city-resturants',
        name: 'city-resturants',
        component: CityResturants,
    },
    {
        path: '/resturant-menu/:id',
        name: 'resturant-menu',
        component: ResturantMenu,
    },
    {
<<<<<<< HEAD
        path: '/*',
        component: NotFound,
=======
        path: '/order/create',
        name: 'order-create',
        component: OrderCreate,
>>>>>>> stripe-prova-2
    }
];

//istanza del router
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

//esporto il router
export default router