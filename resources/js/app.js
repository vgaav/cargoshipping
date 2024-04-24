import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router.js';
import { createVuetify, Vmessages } from 'vuetify'


// Import Vuetify styles
import 'vuetify/styles'

// Import Vuetify components and directives
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// Import Vuetify CSS
import 'vuetify/dist/vuetify.min.css'

// Import Material Design Icons
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.min.css';
import '@fortawesome/fontawesome-free/css/all.min.css';

const vuetify = createVuetify({
  components,
  directives,
})

const app = createApp(App)
app.use(router)
app.use(vuetify)

app.mount('#app')
