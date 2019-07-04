/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import UsersIndex from './components/users/UsersIndex.vue';
import UsersCreate from './components/users/UsersCreate.vue';
import UsersEdit from './components/users/UsersEdit.vue';

import CategoriesIndex from './components/categories/CategoriesIndex.vue';
import CategoriesCreate from './components/categories/CategoriesCreate.vue';
import CategoriesEdit from './components/categories/CategoriesEdit.vue';

import PlantsIndex from './components/plants/PlantsIndex.vue';
import PlantsCreate from './components/plants/PlantsCreate.vue';
import PlantsEdit from './components/plants/PlantsEdit.vue';

const routes = [
    {
        path: '/',
        components: {
        	usersIndex: UsersIndex,
            categoriesIndex: CategoriesIndex,
            plantsIndex: PlantsIndex,
        }
    },
    {path: '/create-user', component: UsersCreate, name: 'createUser'},
    {path: '/edit-user/:id', component: UsersEdit, name: 'editUser'},

    {path: '/create-category', component: CategoriesCreate, name: 'createCategory'},
    {path: '/edit-category/:id', component: CategoriesEdit, name: 'editCategory'},

    {path: '/create-plant', component: PlantsCreate, name: 'createPlant'},
    {path: '/edit-plant/:id', component: PlantsEdit, name: 'editPlant'},
]
const router = new VueRouter({
	routes
})

const app = new Vue({ router }).$mount('#app')