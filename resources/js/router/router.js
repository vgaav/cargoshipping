import { createRouter, createWebHistory } from 'vue-router';
import HomeVue from '../pages/Home.vue'
import LandingPageVue from '../pages/LandingPage.vue' //Landing page for anonymouse user

const routes = [
    {
        path: '/',
        name:'Home',
        component: LandingPageVue,
    },
    {
        path: '/LandingPage', // Landing page for the user
        name: 'LandingPage',
        component: LandingPageVue,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;
