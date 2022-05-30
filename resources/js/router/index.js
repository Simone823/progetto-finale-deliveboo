import Vue from 'vue';
// importo l'istanza router esportata da index.js 
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/Home.vue';
import ResturantType from '../pages/ResturantType.vue';
//faccio un array che conterrà le rotte
const routes = [
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '/resturant-type',
        name: 'resturant-type',
        component: ResturantType,
    }
];

//istanza del router
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

//esporto il router
export default router