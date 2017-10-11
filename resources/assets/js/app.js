
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

var VueSocketio = require('vue-socket.io');
//Vue.use(VueSocketio, socketio('http://localhost:3000'));
//console.log(socket);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('notifbox', require('./components/NotifBox.vue') );
const app = new Vue({
    el: '#app'
});

$( document ).ready(function() {
    var emailsInput = $('.emailsInputHolder');
    var inputGroupSingle = $('#emailInputEmpty');
    console.log(inputGroupSingle);
    $('.addEmailInput').click(function () {
        emailsInput.append(inputGroupSingle.html());
    })
});