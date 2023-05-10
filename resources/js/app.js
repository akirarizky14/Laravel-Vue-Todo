import './bootstrap';
import { createApp } from 'vue';
import Welcome from './components/Welcome.vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import '../css/app.css'
library.add(faPlusSquare, faTrash);

createApp(Welcome).component('font-awesome-icon', FontAwesomeIcon).mount('#app');
