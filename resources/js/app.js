import './bootstrap';
import '../css/app.css';
import toast from 'toastr';
window.toast= toast;
import UploadPhoto from './componets/upload-photo.vue';
import slugify from './componets/slugify.vue';
import slyt from './componets/slider.vue';
import tags from './componets/tags.vue';
import nested from './componets/menu.vue';
import menubuttons from './componets/menubuttons.vue';

import { createApp } from 'vue';

const app=createApp({});
app.component('uploadphoto',UploadPhoto);
app.component('slugify',slugify);
app.component('slyt',slyt);
app.component('tags',tags);
app.component('nested', nested);
app.component('menubuttons', menubuttons);
app.mount('#app');


$('#nestable').nestable({
    maxDepth: 2
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
