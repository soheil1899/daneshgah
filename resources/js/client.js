
require('./bootstrap');

window.Vue = require('vue');
window.axios=require('axios');


Vue.component('slider-compo', require('./components/client/Slider.vue').default);
Vue.component('lastnews', require('./components/client/Lastnews.vue').default);
Vue.component('important-news', require('./components/client/Importantnews.vue').default);
Vue.component('showarticle', require('./components/client/Showarticle.vue').default);











const app = new Vue({
    el: '#client',
});





/* npms

npm install verte --save


*/
