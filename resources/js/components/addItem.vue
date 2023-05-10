<template>
    <div class="w-full flex justify-center items-center">
      <div class="w-1/2 h-full gap-3 flex justify-center items-center">
        <!-- input item -->
        <input class="w-64 h-12 rounded-md px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 font-semibold" type="text" v-model="item.name" placeholder="Enter item name">
        <!-- add button -->
        <font-awesome-icon class="w-18 text-white rounded-md shadow-md cursor-pointer"
          icon="plus-square"
          @click="addItem"
          :class="[item.name ? 'active' : 'inactive', 'plus']"
        />
      </div>
    </div>
  </template>
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        item: {
          name: ''
        }
      };
    },
    methods: {
      addItem() {
        if (this.item.name === '') {
          return;
        }
        axios
          .post('/api/item/store', {
            name: this.item.name
          })
          .then(response => {
            if (response.status === 201) {
              this.item.name = '';
              this.$emit('reloadlist'); // Memanggil event reloadlist pada komponen induk
            }
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  };
  </script>
  
  <style>
  input {
    background-color: white;
    width: 200px;
    outline: 0;
  }
  .plus {
    font-size: 28px;
    cursor: pointer;
  }
  .plus:active{
    color: rgb(78, 252, 93);
  }
  .plus:hover{
    color: rgb(14, 186, 29);
  }
  .active {
    color: rgb(0, 209, 17);
  }
  .inactive {
    color: rgb(0, 0, 0);
  }
  </style>
  