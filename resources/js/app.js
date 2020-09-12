/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated.js';

Vue.use(VueInternationalization);
const i18n = new VueInternationalization({
    locale: document.head.querySelector('meta[name="locale"]').content,
    messages: Locale
});

import VueFormulate from '@braid/vue-formulate'

Vue.use(VueFormulate)

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

// crop image
import VueCroppie from 'vue-croppie'
import 'croppie/croppie.css' // import the croppie css manually
 
Vue.use(VueCroppie)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('vtntest', require('./components/ExampleComponent.vue').default);
Vue.component('login-register', require('./components/LoginRegister.vue').default);
Vue.component('membership-form', require('./components/MembershipForm.vue').default);
Vue.component('button-show-modal', require('./components/ButtonShowModal.vue').default);
Vue.component('booking-form', require('./components/BookingForm.vue').default);
Vue.component('change-language', require('./components/ChangeLanguage.vue').default);
Vue.component('contact-form', require('./components/ContactForm.vue').default);
Vue.component('profile', require('./components/Profile.vue').default);
Vue.component('profile-membership', require('./components/ProfileMembership.vue').default);
Vue.component('profile', require('./components/Profile.vue').default);
Vue.component('change-password', require('./components/ChangePass.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$eventBus = new Vue(); // Global event bus

const app = new Vue({
    el: '#app',
    i18n,
});
