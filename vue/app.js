window.Vue = require('vue')

Vue.component('vmw-search', require('./components/SearchComponent.vue').default)

const app = new Vue({
    el: "#app"
})