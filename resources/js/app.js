require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('my-posts-component', require('./components/MyPostsComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('post-component', require('./components/PostComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
