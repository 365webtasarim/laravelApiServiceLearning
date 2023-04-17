<template>
    <carousel :v-bind="settings" >
        <slide   v-for="(img,index) in images" :key="slide">
            <a :href="img.url">
                    <img className="img-fluid" :src="img.src" :key="index">
            </a>
        </slide>

        <template #addons>
            <navigation/>
            <pagination/>
        </template>
    </carousel>

</template>
<script>
import axios from "axios";
import 'vue3-carousel/dist/carousel.css'
import {Carousel, Slide, Pagination, Navigation} from 'vue3-carousel'
import {start} from "@popperjs/core";

let axiosConfig = {
    headers: {
        "Access-Control-Allow-Origin": "*"
    }
};
export default {
    methods: {

    },
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        msg: String
    },
    data() {
        return {
            images: [],
            settings: {
                itemsToShow: 1,
                snapAlign: 'start',
                slideWidth:'1544',
            },
        }
    },
    created() {
        axios.get('http://127.0.0.1:8000/slider/', axiosConfig)
            .then(response => {
                this.images = response.data;
            });
    }
};
</script>
<style>

</style>
