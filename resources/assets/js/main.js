import Vue from 'vue'
import { Button, Select } from 'element-ui'
import App from './components/App.vue'
import $ from 'Jquery'

Vue.prototype.$ELEMENT = { size: 'small' }

Vue.component(Button.name, Button)
Vue.component(Select.name, Select)

new Vue({
    el: '#app',
    render: h => h(App)
})