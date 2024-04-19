import { createRouter, createWebHistory } from 'vue-router';
import LoginVue from '../pages/Login.vue'
import LandingPageVue from '../pages/LandingPage.vue'

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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;
