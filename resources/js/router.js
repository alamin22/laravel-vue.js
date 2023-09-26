
import { createRouter, createWebHistory } from 'vue-router';
import home from './pages/home.vue';
import contact from './pages/contact.vue';
import login from './pages/login.vue';
import action from './pages/action.vue';

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
			component: login
		},
        {
			path: '/action',
			name: 'Action',
			component: action
		}
    
    ];
const router = createRouter({
	history:createWebHistory(),
	routes
});
export default router;