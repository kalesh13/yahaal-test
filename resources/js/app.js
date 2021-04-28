require('./bootstrap');

import Vue from 'vue';
import { router, VueRouter } from './router';

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    data: {
        is_loading: true,
    },
});

router.beforeEach((to, from, next) => {
    app && (app.is_loading = true);
    next();
});

router.afterEach(() => {
    app && (app.is_loading = false);
});
