import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from "../views/Main.vue"
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Main',
        component: Main,
        children: [
            { name: 'Home', path: '/', component: Home },
            { name: 'Cate', path: 'cate', component: () => import('../views/Cate.vue') },
            { name: 'Cart', path: 'cart', component: () => import('../views/Cart.vue') },
            { name: 'Me', path: 'me', component: () => import('../views/Me.vue') }
        ]
    },
    {
        name: 'BookDetail',
        path: '/books/:id',
        component: () => import('../components/BookDetail.vue')
    },
    {
        path: "*",
        redirect: "/"
    }

]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router