
import { createApp } from 'vue';
import router from './router/index.js'
import App from './App.vue'
import axios from 'axios'

const app = createApp(App);

app.use(router)

app.config.globalProperties.axios = axios
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

app.mount('#app');
