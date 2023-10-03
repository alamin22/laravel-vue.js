
import { createRouter, createWebHistory } from 'vue-router';
import home from './pages/home.vue';
import contact from './pages/contact.vue';
import login from './pages/login.vue';
import action from './pages/action.vue';
import dashboard from './pages/admin/dashboard.vue';

const routes =[
        {
            path: '/home',
			name: 'Home',
            component: home,
        },
        {
            path: '/contact',
			name: 'Contact',
            component: contact
        },
		{
			path: '/login',
			name: 'Login',
			component: login,
			meta:{
				requiresAuth:false
			}
		},
        {
			path: '/action',
			name: 'Action',
			component: action
		},
		{
		path:'/admin/pannel',
		name:'Dashboard',
		component:dashboard,
		meta:{
			requiresAuth:true
		}
		}
    
    ];
const router = createRouter({
	history:createWebHistory(),
	routes
});

router.beforeEach((to,from)=>{
	if(to.meta.requiresAuth && !localStorage.getItem('token')){
		return {name:'Login'}
	}
	if(to.meta.requiresAuth==false && localStorage.getItem('token')){
		return {name:'Dashboard'}
	}
});

export default router;