<template>
    <!-- list item inside the list.vue -->
    <div class="bg-green-200 h-12 p-2 m-2 rounded-md flex w-64 justify-between items-center shadow-lg hover:scale-105 transition-transform duration-300">
      <!-- list name -->
      <span class="w-32 overflow-scroll">{{ item.name }}</span>
      <!-- list edit button -->
      <div>
        <button class="w-12 " @click="openModal">
          <font-awesome-icon
            :icon="['fas', 'pen-to-square']"
            size="xl"
            class="text-yellow-500"
            :class="{ 'hover:text-yellow-600': isHovered, 'active:text-yellow-500': isActive }"
            @mouseover="isHovered = true"
            @mouseout="isHovered = false"
            @mousedown="isActive = true"
            @mouseup="isActive = false"
          ></font-awesome-icon>
        </button>
        <!-- modal if you click the edit  -->
        <div v-if="showModal" class="modal">
          <div class="modal-content">
            <h2 class="text-xl font-bold mb-4">Edit Item</h2>
            <div class="form-group">
              <label for="editItemInput" class="text-sm font-medium">New Item Name:</label>
              <input v-model="updatedName" type="text" id="editItemInput" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="modal-buttons flex justify-end mt-4">
              <button class="btn mr-2" @click="updateItem">Save</button>
              <button class="btn" @click="closeModal">Cancel</button>
            </div>
          </div>
        </div>
        <!-- remove item -->
        <button @click="removeItem()" class="trashcan">
          <font-awesome-icon
            icon="trash"
            size="xl"
            class="text-red-500"
            :class="{ 'hover:text-red-700': isHovered, 'active:text-red-500': isActive }"
            @mouseover="isHovered = true"
            @mouseout="isHovered = false"
            @mousedown="isActive = true"
            @mouseup="isActive = false"
          ></font-awesome-icon>
        </button>
      </div>
    </div>
  </template>
  
  <script>
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
  import { library } from '@fortawesome/fontawesome-svg-core';
  import { fas } from '@fortawesome/free-solid-svg-icons';
  import axios from 'axios';
  
  library.add(fas);
  
  export default {
    props: ['item'],
    components: {
      FontAwesomeIcon,
    },
    data() {
      return {
        showModal: false,
        updatedName: '',
        isHovered: false,
        isActive: false,
      };
    },
    methods: {
      openModal() {
        this.showModal = true;
      },
      closeModal() {
        this.showModal = false;
      },
      updateItem() {
        this.item.name = this.updatedName; // Menetapkan nilai name sesuai dengan updatedName
        axios
            .put(`api/item/${this.item.id}`, {
            item: this.item,
            })
            .then((response) => {
            if (response.status === 200) {
                this.$emit('item-changed');
            }
            })
            .catch((error) => {
            console.log(error);
            });

        this.showModal = false;
        },
      removeItem() {
        axios
          .delete(`api/item/${this.item.id}`)
          .then((response) => {
            if (response.status === 200) {
              this.isRemoving = true; // Trigger the animation
              setTimeout(() => {
                this.$emit('item-changed');
              }, 100);}
          })
          .catch((error) => {
            console.log(error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  .trashcan {
    border: none;
    color: red;
    outline: none;
  }
  .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .modal-buttons {
    display: flex;
    justify-content: flex-end;
  }
  </style>  