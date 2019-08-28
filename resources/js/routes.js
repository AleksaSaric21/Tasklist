import Home from './components/Home.vue';
import Login from './components/Login';
import List from "./components/tasks/List";
import New from "./components/tasks/New";
import Main from "./components/tasks/Main";
import Task from "./components/tasks/Task";

export const routes = [
    {
        path: '/',
        meta:{
            requiresAuth: true
        },
        component: Home
    },
    {
        path: '/login',
        name: Login,
        component: Login
    },
    {
        path: '/tasks',
        component:Main,
        meta:{
            requiresAuth:true
        },
        children:[
            {
                path: '/',
                component: List
            },
            {
                path: '/create',
                component: New
            },
            {
               path: ':id',
               component: Task
            }
        ]

    }
];