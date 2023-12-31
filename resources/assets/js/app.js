window.Vue = require('vue');
window._ = require('lodash');

require('./bootstrap');
import Vue from 'vue';
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);


Vue.directive('select2', {
    inserted(el) {
        $(el).on('select2:select', () => {
            const event = new Event('change', {bubbles: true, cancelable: true});
            el.dispatchEvent(event);
        });
    },
});
