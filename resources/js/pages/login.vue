<template>
	
	<div>
		<action @myAddress="actionHere($event)" name="alamin" designation="Software Engineer"/>
		<div class="row col-lg-12">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				{{ password }}
				<form @submit.prevent="login" class="mt-5">
					<h3 class="text-center">LOGIN</h3>
					<div class="container">
						<label for="uname"><b>Username</b></label>
						<input type="text" v-model="item.email" placeholder="Enter Username" name="uname" required>

						<label for="psw"><b>Password</b></label>
						<input type="password" v-model="item.password" placeholder="Enter Password" name="psw" required>

						<button type="submit">Login {{ address }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';
import action from './action.vue'
export default{
	name:"Login",
	data(){
		return {
			item:{
				email:'',
				password:''
			},
			address:'',
		}
	},
	methods:{
		login(){
			axios.post('http://localhost:8000/api/login',this.item)
				.then(res=>{
					console.log(res.data);
				});
		},
		actionHere(data){
			this.address = data;
		}
	},
	components:{
		action:action,
	}
}
</script>