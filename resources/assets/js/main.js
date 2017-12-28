import Vue from 'vue'
import { Button, Select } from 'element-ui'
import App from './components/App.vue'
import VueResource from 'vue-resource';
window.$ =  require('jquery')


Vue.prototype.$ELEMENT = { size: 'small' }

Vue.component(Button.name, Button)
Vue.component(Select.name, Select)
Vue.use(VueResource);

new Vue({
    el: '#app',
    render: h => h(App)
})