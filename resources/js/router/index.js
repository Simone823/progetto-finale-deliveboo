import Vue from 'vue';
// importo l'istanza router esportata da index.js 
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/Home.vue';
import ResturantType from '../pages/ResturantType.vue';
import CityResturants from '../pages/CityResturants.vue';
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
    }
];

//istanza del router
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

//esporto il router
export default router