
//Подключение бутсрапа
require('./bootstrap');

window.Vue = require('vue');
//библиотека для вивода времени
import moment from 'moment';
//библиотека для валидации форм
import { Form, HasError, AlertError } from 'vform';
//библиотека всплывающих окон
import swal from 'sweetalert2'
window.swal = swal;
//вспливашка тост
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;
window.Form = Form;

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

Vue.component('pagination', require('laravel-vue-pagination'));
//роутинг
import VueRouter from 'vue-router'
Vue.use(VueRouter);
//библиотека прошресс бара
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
    color: 'rgb(143,255,199)',
    failedColor: 'red',
    height: '3px'
});
//маршрути
let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/main_title_left', component: require('./components/main_title_left.vue').default },
    { path: '/artists', component: require('./components/artists.vue').default },
    { path: '/news_artist', component: require('./components/news_artist.vue').default },
    { path: '/agency', component: require('./components/agency.vue').default },
    { path: '/main_content', component: require('./components/main_content.vue').default },
];

const router = new VueRouter({
    mode: 'history',
    routes // сокращённая запись для `routes: routes`
});
//фильтр
Vue.filter('upText',function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});
//фильтр
Vue.filter('myDate',function(created){
    return moment(created).format('MMMM Do YYYY');
});


window.Fire = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );
//
// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );
//
// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
