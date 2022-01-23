import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)

const Welcome = () => import('../components/Welcome.vue')
const UserList = () => import('../components/User/List.vue')
const UserCreate = () => import('../components/User/Add.vue')
const UserEdit = () => import('../components/User/Edit.vue')
const GroupList = () => import('../components/Group/List.vue')
const Login = () => import('../components/Auth/Login.vue')


export const Routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome,
        meta: {
            middleware:"guest",
        }
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            middleware:"guest",
        }
    },
    {
        name: 'userList',
        path: '/users',
        component: UserList,
        meta: {
            middleware:"guest",
        }
    },
    {
        name: 'userAdd',
        path: '/users/add',
        component: UserCreate,
        meta:{
            middleware:"auth"
        },
    },
    {
        name: 'userEdit',
        path: '/users/:id/edit',
        component: UserEdit,
        meta:{
            middleware:"auth"
        },
    },
    {
        name: 'groupList',
        path: '/groups',
        component: GroupList,
        meta: {
            middleware:"guest",
        }
    }
]

var router  = new VueRouter({
    mode: 'history',
    routes: Routes
})

router.beforeEach((to, from, next) => {
    if(to.meta.middleware=="guest"){
        if(store.state.auth.authenticated){
            next()
        }
        next()
    }else{
        if(store.state.auth.authenticated){
            next()
        }else{
            next({name:"login"})
        }
    }
})

export default router