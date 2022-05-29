import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Cars from '../components/Cars';
import AddCar from '../components/AddCar';
import EditCar from '../components/EditCar';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'cars',
        path: '/cars',
        component: Cars
    },
    {
        name: 'addcar',
        path: '/cars/add',
        component: AddCar
    },
    {
        name: 'editcar',
        path: '/cars/edit/:id',
        component: EditCar
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
