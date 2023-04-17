<template>
    <div class="hello">
        <h1>{{ msg }}</h1>
        <draggable v-model="images" tag="transition-group" :component-data="{name:'fade'}">
            <template #item="{element}">
                <div>{{element.title}}</div>
            </template>
        </draggable>
    </div>
</template>

<script>
import draggable from "vue3-draggable";
export default {
    name: "HelloWorld",
    props: {
        msg: String,
    },
    components: {
        draggable,
    },
    data() {
        return {
            drag: false,
            images: [
                {
                    url:
                        "https://res.cloudinary.com/milecia/image/upload/v1656606255/map-shots/xxbu8zaflm5qdwawurbb.png",
                    title: "map-shots/xxbu8zaflm5qdwawurbb",
                },
                {
                    url:
                        "https://res.cloudinary.com/milecia/image/upload/v1653776620/metal_ehet1g.jpg",
                    title: "metal_ehet1g",
                },
                {
                    url:
                        "https://res.cloudinary.com/milecia/image/upload/v1653756834/wood_vuxmb7.jpg",
                    title: "wood_vuxmb7",
                },
                {
                    url:
                        "https://res.cloudinary.com/milecia/image/upload/v1652466294/map-shots/c2dhtxam0xkjbd3w5znd.jpg",
                    title: "map-shots/c2dhtxam0xkjbd3w5znd",
                },
                {
                    url:
                        "https://res.cloudinary.com/milecia/image/upload/v1652466238/map-shots/uexqk9u6om4xkukyytbq.png",
                    title: "map-shots/uexqk9u6om4xkukyytbq",
                },
            ],
        };
    },
    methods: {
        async getImages() {
            // await fetch("http://localhost:3004/images").then(async (data) => {
            //   const imageData = (await data.json()).images;
            //   this.images = imageData;
            // });
        },
    },
    mounted() {
        // methods can be called in lifecycle hooks, or other methods!
        this.getImages();
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
    margin: 40px 0 0;
}
ul {
    list-style-type: none;
    padding: 0;
}
li {
    display: inline-block;
    margin: 0 10px;
}
a {
    color: #42b983;
}
</style>
