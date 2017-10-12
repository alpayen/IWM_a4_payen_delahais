
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

//var VueSocketio = require('vue-socket.io');

var VueCodeMirror = require('vue-codemirror');
Vue.use(VueCodeMirror);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('notifbox', require('./components/NotifBox.vue') );
Vue.component('codebox', require('./components/Codebox.vue') );

const editorcontainer = new Vue({
   el: '#editorcontainer',
   data : {
       io : require('socket.io-client'),
       socket : io.connect('http://localhost:3000')
   },created: function () {
        //console.log('Parent Mounted, long live the king');
        //console.log(this.socket);
    }
});


$( document ).ready(function() {
    var emailsInput = $('.emailsInputHolder');
    var inputGroupSingle = $('#emailInputEmpty');
    $('.addEmailInput').click(function () {
        emailsInput.append(inputGroupSingle.html());
    })
});