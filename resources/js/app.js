require('./bootstrap');


window.Vue = require('vue');

Vue.component('user-card', require('./components/UserCard.vue').default);


new Vue({
    el:'#wrapper'
})