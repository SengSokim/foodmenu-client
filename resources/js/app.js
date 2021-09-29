require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');
window._ = require('lodash');

import VeeValidate from 'vee-validate';

import Vue from 'vue';

Vue.use(VeeValidate);

Vue.directive('select2', {
    inserted(el) {
        $(el).on('select2:select', () => {
            const event = new Event('change', {bubbles: true, cancelable: true});
            el.dispatchEvent(event);
        });
    },
});
