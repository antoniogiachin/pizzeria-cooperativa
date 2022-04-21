import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Home from './pages/Home.vue';
import Menu from './pages/Menu.vue';
import Order from './pages/Order.vue';
import Pizza from './pages/Pizza.vue';
import NotFound from './pages/NotFound.vue';
import Contacts from './pages/Contacts.vue';

const router = new VueRouter(

    {
        mode: 'history',
        routes: [
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/menu',
                name: 'menu',
                component: Menu
            },
            {
                path: '/order',
                name: 'order',
                component: Order
            },
            //rotta singola pizza
            {
                path: '/menu/:slug',
                name: 'pizza',
                component : Pizza,
            },
            //rotta catch all
            {
                path: '/:pathMatch(.*)*',
                name: 'NotFound',
                component: NotFound
            },
            //rotta email
            {
                path: '/contacts',
                name: 'contacts',
                component: Contacts
            }
        ]
    }
);

export default router
