<template>
    <div className="container">
        <div className="row justify-content-center">
            <div className="col-md-8">
                <carousel>
                    <img className="img-fluid" v-for="(img, index) in images" :src="img.src" :key="index">
                </carousel>
            </div>
        </div>
    </div>
</template>
<script>
import carousel from "vue-owl-carousel";

export default {
    components: {
        carousel
    },
    props: {
        msg: String
    },
    data() {
        return {
            images: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/slider')
            .then(response => {
                this.images = response.data;
                console.log(this.images);
            });
    }
};
</script>
