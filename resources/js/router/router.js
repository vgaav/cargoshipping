import { createRouter, createWebHistory } from 'vue-router'
import LoginVue from '../pages/Login.vue'
import LandingPageVue from '../pages/LandingPage.vue'
import MainMenuUserVue from '../pages/MainMenuUser.vue'
import CarrierInfoVue from '../pages/CarrierInfo.vue'
import DashboardVue from '../pages/Dashboard.vue'
import CarrierDashboardVue from '../pages/CarrierDashboard.vue'

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
        path: '/MainMenuUser',
        name: 'MainMenuUser',
        component: MainMenuUserVue
    },
    {
        path:'/CarrierInfo',
        name:'CarrierInfo',
        component: CarrierInfoVue
    },
    {
        path:'/Dashboard',
        name:'Dashboard',
        component: DashboardVue
    },
    {
        path:'/CarrierDashboard',
        name:'CarrierDashboard',
        component:CarrierDashboardVue
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;
