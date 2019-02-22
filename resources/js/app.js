
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
window.axios.interceptors.response.use(response => {
    return response;
}, error => {
    if (error && error.response) {
        switch (error.response.status) {
            case 400:
                // error.message = '请求错误';
                error.message = error.response.data.message;
                break;

            case 401:
                error.message = '未授权，请登录';
                break;

            case 403:
                // error.message = '拒绝访问';
                error.message = error.response.data.message;
                break;

            case 404:
                error.message = `请求地址出错: ${error.response.config.url}`;
                break;

            case 408:
                error.message = '请求超时';
                break;

            case 500:
                error.message = '服务器内部错误';
                break;

            case 501:
                error.message = '服务未实现';
                break;

            case 502:
                error.message = '网关错误';
                break;

            case 503:
                error.message = '服务不可用';
                break;

            case 504:
                error.message = '网关超时';
                break;

            case 505:
                error.message = 'HTTP版本不受支持';
                break;

            default:
                error.message = error.response.data.message;
                break;
        }

        noty('error', error.message);
    }

    return Promise.reject(error);
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('noty', require('./components/Noty.vue'));
Vue.component('thumbs-up-button', require('./components/ThumbsUpButton.vue'));
Vue.component('comment-form', require('./components/CommentForm.vue'));
Vue.component('markdown-textarea', require('./components/MarkdownTextarea.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
