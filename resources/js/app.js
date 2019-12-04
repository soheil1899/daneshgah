
require('./bootstrap');

window.Vue = require('vue');
window.axios=require('axios');

import tinymce from 'vue-tinymce-editor';
Vue.component('tinymce', tinymce);


Vue.component('dashboard-component', require('./components/admin/DashboardComponent.vue').default);
Vue.component('myinfo-component', require('./components/admin/users/MyinfoComponent.vue').default);
Vue.component('user-component', require('./components/admin/users/UserComponent.vue').default);

Vue.component('slider-component', require('./components/admin/SliderComponent.vue').default);
Vue.component('setting-component', require('./components/admin/SettingComponent.vue').default);



Vue.component('articlegroup-component', require('./components/admin/ArticleGroupComponent.vue').default);
Vue.component('article-component', require('./components/admin/ArticleComponent.vue').default);



Vue.component('menu-component', require('./components/admin/MenuComponent.vue').default);



Vue.component('error', require('./components/custom/error.vue').default);






const app = new Vue({
    el: '#app',
});





/* npms

npm install verte --save


*/
