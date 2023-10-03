<template>
    <div>
        <div class="card-header text-center mt-5">
            <div >
               <div class="row" v-if="isAction==true" >
                    <div id="name" class="bg-primary " style="width:50%;height:200px">
                        <button >{{ name }}</button>
                    </div>
                    <div class="bg-warning desig" style="width:50%;height:200px">
                        {{ designation }} {{ isImportant }}
                    </div>
               </div> 
               
               <div class="row" v-else>
                    <div class="bg-warning desig" style="width:50%;height:200px">
                        {{ designation }}
                    </div>
                    <div id="name" class="bg-primary" style="width:50%;height:200px">
                        <button v-on:click="myEvent">{{ name }}</button>
                    </div>
               </div> 
            </div>
            <button @click="toggle()">
              {{ isAction == true ? 'ON' : 'OFF' }}
            </button>
        </div>
    </div>
</template>
<script>
export default{
    name:'Action',
    data(){
        return {
            isAction:false
        }
    },
    props:
       [
            'name','designation'
       ],
    methods:{
        toggle(){
            this.isAction == false ? this.isAction = true : this.isAction = false
        },
        myEvent(){
            this.$emit('myAddress','joypurhat')
        }
    },
    computed:{
        isImportant(){
            return 'Computed attribute vue';
        }
        
    }
}
</script>
<style>
    #name{
        font-size:23px;
        color: red;
        font-weight: 800;
    }
    .desig{
        font-size:23px;
        color: green;
        font-weight: 800;
    }
</style>