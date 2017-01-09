import Example from "../components/frontend/Example.vue";
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', Example);

const app = new Vue({
    el: '#app'
});