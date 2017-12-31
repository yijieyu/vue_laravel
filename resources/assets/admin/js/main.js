import Vue from 'vue'
import ElementUI from 'element-ui'
import App from './components/App.vue'
import routes from './routes';
import VueRouter from 'vue-router'
import axios from 'axios'
// import VueResource from 'vue-resource'

// require('./bootstrap');
window.$ =  require('jquery');

Vue.prototype.$ELEMENT = { size: 'small' };
Vue.prototype.$http = axios;

const router = new VueRouter({
    routes
});

Vue.use(ElementUI);
// Vue.use(VueResource);
Vue.use(VueRouter)

new Vue({
    el: '#app',
    template: '<App/>',
    router,
    components: { App }
// render: h => h(Login)
});

// new Vue({
//     el: 'app',
//     template: '<App/>',
//     // filters: filter,
//     router,
//     // store,
//     components: { App }
// // render: h => h(Login)
// }).$mount('#app')