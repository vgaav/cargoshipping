import { createRouter, createWebHistory } from 'vue-router';
import LoginVue from '../pages/Login.vue'
import LandingPageVue from '../pages/LandingPage.vue'
import RegisterVue from '../pages/Register.vue'

const routes = [
    {
        path: '/',
        name:'LandingPage',
        component: LandingPageVue,
    },
    {
        path: '/Login',
        name: 'Login',
        component: LoginVue,
    },
    {
        path:'/Register',
        name: 'Register',
        component:RegisterVue
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;
