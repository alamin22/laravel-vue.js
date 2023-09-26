<template>
    <div>
        <div class="card-header text-center mt-5">
            <div >
               <div class="row" v-if="isAction==true" >
                    <div class="bg-primary" style="width:50%;height:200px">

                    </div>
                    <div class="bg-warning" style="width:50%;height:200px">

                    </div>
               </div> 
               
               <div class="row" v-else>
                    <div class="bg-warning" style="width:50%;height:200px">

                    </div>
                    <div class="bg-primary" style="width:50%;height:200px">

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
    methods:{
        toggle(){
            this.isAction == false ? this.isAction = true : this.isAction = false
        }
    }
}
</script>