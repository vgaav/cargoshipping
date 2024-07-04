import { createRouter, createWebHistory } from 'vue-router'
import LoginVue from '../pages/Login.vue'
import LandingPageVue from '../pages/LandingPage.vue'
import DashboardVue from '../pages/Dashboard.vue'
import CarrierDashboardVue from '../pages/CarrierDashboard.vue'
import ItemListing from '../pages/ItemListing.vue'
import CarrierTesting from '../pages/CarrierTesting.vue'
import MyBids from '../pages/MyBids.vue'


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
    },
    {
        path: '/carrier-testing',
        name: 'CarrierTesting',
        component: CarrierTesting
      },
      {
        path: '/my-bids',
        name: 'MyBids',
        component: MyBids,
      },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;
