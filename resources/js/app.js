import './bootstrap';
import '../css/app.css';
import toast from 'toastr';
window.toast= toast;
import UploadPhoto from './componets/upload-photo.vue';
import gallerymanager from './componets/gallery-manager.vue';
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
app.component('gallerymanager', gallerymanager);
app.mount('#app');

$('body').on('submit', 'form[name=delete_item]', function(e) {
    e.preventDefault();

    let form = this,
        link = $('a[data-method="delete"]'),
        cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
        confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete",
        title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Warning",
        text = (link.attr('data-trans-text')) ? link.attr('data-trans-text') : "Are you sure you want to delete this item?";
    Swal.fire({
        title: title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: cancel,
        confirmButtonText: confirm
    }).then((result) => {

        if (result && result.dismiss!='cancel') {
           form.submit();
        }
    })

}).on('click', 'a[name=confirm_item]', function(e) {
    /**
     * Generic 'are you sure' confirm box
     */
    e.preventDefault();

    let link = $(this),
        title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to do this?",
        cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
        confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Continue";

    Swal.fire({
        title: title,
        type: "info",
        showCancelButton: true,
        cancelButtonText: cancel,
        confirmButtonColor: "#3C8DBC",
        confirmButtonText: confirm,
        closeOnConfirm: true
    }, function(confirmed) {
        if (confirmed)
            window.location = link.attr('href');
    });
}).on('click', function(e) {
    /**
     * This closes popovers when clicked away from
     */
    $('[data-toggle="popover"]').each(function() {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
