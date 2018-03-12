
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import StarRating from 'vue-star-rating';

// Components from packages
Vue.component('star-rating', StarRating);

// Custom components
Vue.component('place-form', require('./components/PlaceForm.vue'));
Vue.component('event-form', require('./components/EventForm.vue'));
Vue.component('review-form', require('./components/ReviewForm.vue'));
Vue.component('review-list', require('./components/ReviewList.vue'));
Vue.component('event-list', require('./components/EventList.vue'));
// Custom containers
Vue.component('review-container', require('./containers/ReviewContainer.vue'));

const app = new Vue({
    el: '#app'
});
