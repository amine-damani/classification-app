require('./bootstrap');
window.Vue = require('vue').default;

import App from './components/App.vue';
import Vue from 'vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import router from './router'
import store from './store'

Vue.use(VueAxios, axios)

const app = new Vue({
    el: '#app',
    router: router,
    store,
    render: h => h(App),
});