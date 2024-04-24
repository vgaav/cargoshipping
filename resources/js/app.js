//vue
import { createApp } from 'vue'
import App from './App.vue'

//components
import NavBarVue from './components/NavBar.vue'

//vue-router
import router from './router/router.js';

//vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
  components,
  directives,
})

//material design icons
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.min.css';
import '@fortawesome/fontawesome-free/css/all.min.css';

const app = createApp(App)
app.component('NavBarVue', NavBarVue)
app.use(router)
app.use(vuetify)
app.mount('#app')