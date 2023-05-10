<template>
  <div class="h-3/4 w-full">
    <!-- Add Item for the list -->
    <div class="h-1/4 w-full flex ">
      <add-item @reloadlist="getList" />
    </div>
    <!-- List -->
    <div class="h-3/4 w-full flex flex-col items-center overflow-scroll">
      <list-item v-for="(item, index) in localItems" :key="index" :item="item" @item-changed="reloadList" />
    </div>
  </div>
</template>


<script>
import axios from 'axios';
import AddItem from './addItem.vue';
import ListItem from './listItem.vue';

export default {
  components: {
    AddItem,
    ListItem
  },
  data() {
    return {
      localItems: []
    };
  },
  created() {
    this.getList();
  },
  methods: {
    getList() {
      axios
        .get('api/items')
        .then(response => {
          this.localItems = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    reloadList() {
      this.getList(); // Memperbarui daftar item
    }
  }
};
</script>

<style scoped>
</style>
