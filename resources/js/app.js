import { createApp } from 'vue';
import axios from 'axios';

// Import your main Vue component
import App from './App.vue';

// Import other components
import NavBarVue from './components/NavBar.vue';
import LeafletMap from './components/LeafletMap.vue';

// Import Vue Router
import router from './router/router.js';

// Import Vuetify
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

// Import material design icons
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import '@mdi/font/css/materialdesignicons.min.css';
import '@fortawesome/fontawesome-free/css/all.min.css';

// Leaflet Map 
import 'leaflet/dist/leaflet.css';

const vuetify = createVuetify({
  components,
  directives,
});

const app = createApp(App);

// Register components, plugins, and router
app.component('NavBarVue', NavBarVue);
app.component('LeafletMap',LeafletMap);
app.use(router);
app.use(vuetify);

// Retrieve CSRF token and set it as default header for Axios
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

// Mount the Vue app
app.mount('#app');

