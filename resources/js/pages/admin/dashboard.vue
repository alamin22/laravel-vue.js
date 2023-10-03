<template>
    <div>
        <h2>Welcome Alamin</h2><br>
        <button @click="logout()">Logout</button>
    </div>
</template>
<script>
    export default{
        name:"Dashboard",  
        data(){
            return{

            }
        },
        methods:{
            logout(){
                localStorage.setItem('token','');
                this.$router.push({name:'Login'});
            }
        }
    }
</script>