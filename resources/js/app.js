
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.NProgress = require('nprogress');

// noty alert
window.noty = function (type = 'alert', message = '', timeout = '2000') {
    new Noty({
        timeout: timeout,
        text: message,
        type: type
    }).show();
};

// axios 响应拦截器，异常信息提示处理
require('./lib/handlehttp');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('noty', require('./components/Noty.vue').default);
Vue.component('thumbs-up-button', require('./components/ThumbsUpButton.vue').default);
Vue.component('comment-thumbs-up-button', require('./components/CommentThumbsUpButton.vue').default);
Vue.component('collection-button', require('./components/CollectionButtom.vue').default);
Vue.component('comment-form', require('./components/CommentForm.vue').default);
Vue.component('comment-list', require('./components/CommentList.vue').default);
Vue.component('markdown-textarea', require('./components/MarkdownTextarea.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
