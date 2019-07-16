/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './views/layouts/App';
import router from './router';
import store from './store';
import VueSelect from 'vue-select';
import Vuelidate from 'vuelidate';
import DatePicker from 'vuejs-datepicker';

// Global Broadcasting
window.Broadcast = new Vue();

// Use Validation
Vue.use(Vuelidate);

// Plugin Components
Vue.component('vue-select', VueSelect);
Vue.component('datepicker', DatePicker);

// Layouts
Vue.component('navbar', require('./views/layouts/Navbar.vue'));
Vue.component('sidebar', require('./views/layouts/Sidebar.vue'));

// OAuth2
/*Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));*/

const app = new Vue({
  el: '#app',
  components: { app: App },
  router,
  store
});
