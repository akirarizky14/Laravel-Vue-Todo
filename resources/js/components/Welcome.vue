<template>
    <div id="template" class="w-full h-screen flex items-center justify-center">
        <div class=" w-1/2 h-3/4 rounded-lg">
            <!-- title for Todo List -->
            <div class=" h-1/4 flex justify-center items-center ">
                <h1 class="text-7xl font-mono shadow-lg p-5 font-semibold">Todo List</h1>
            </div>
            <!-- List for the list -->
            <list class=" h-3/4 bg-blue-200 shadow-lg rounded-lg mt-5 p-5 flex flex-col justify-center items-center" v-on:reloadList="getList()"/>
        </div>
    </div>
</template>
  
<script>
    import addItem from './addItem.vue';
    import list from './list.vue';
    export default{
        components:{
            addItem,
            list
        }
    }
</script>
  
<style>
  #template{
    background: rgb(2,0,36);
    background: linear-gradient(180deg, rgb(114, 102, 247) 0%, rgb(143, 143, 250) 35%, rgba(0,212,255,1) 100%);
  }
</style>