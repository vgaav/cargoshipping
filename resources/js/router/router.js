import { createRouter, createWebHistory } from 'vue-router'
import LoginVue from '../pages/Login.vue'
import LandingPageVue from '../pages/LandingPage.vue'
import CarrierInfoVue from '../pages/CarrierInfo.vue'
import DashboardVue from '../pages/Dashboard.vue'
import CarrierDashboardVue from '../pages/CarrierDashboard.vue'
import ItemListing from '../pages/ItemListing.vue'

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
    {
        path:'/List',
        name:'ItemListing',
        component: ItemListing
    }

];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;
