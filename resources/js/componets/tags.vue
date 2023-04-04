<template>
    <h1>Etiketler Yöneticisi</h1>
    <input type="text" placeholder="Etiketleri , ile ayırınız" v-model="tag" @keyup="handleTyping">
    <label>Etiketler</label>
    <div class="tags">
        <div v-for="(_tag, index) in tags" :key="index" class="tag" @click="removeTag(index)">{{ _tag }}</div>
    </div>
    <input type="hidden" name="etiket" :value="tags">
</template>

<script>
export default {
    name: "tags",
    props: {
        ['taglar']:{type:Array,required: false,default: () => {return []}},
    },
    data: () => {
        return {
        tag: '',
        tags: [],
    }
    },
    methods: {
        addTag(tag) {
            this.tags.push(tag);
        },
        removeTag(index) {
            this.tags.splice(index, 1);
        },
        tagExists(tag) {
            return this.tags.indexOf(tag) !== -1;
        },
        handleTyping(e) {
            if ( e.keyCode === 188 ) {
                let tag = this.tag.replace(/,/g, '');
                if ( !this.tagExists(tag) ) {
                    this.addTag(tag);
                    this.tag = '';
                }
            }
        }
    },
    beforeMount(){
        if (this.taglar!=""){
            var tagss= this.taglar.split(",");
            tagss.forEach((element) => this.addTag(element));
        }


    },
}
</script>

<style scoped>

input {
    width: 100%;
    margin: 15px 0;
    padding:15px;

}
.tag {
    position: relative;
    display: inline-block;
    margin: 0 10px 10px 0;
    padding: 8px 30px 8px 12px;
    color: #333;
    background: #fff;
    border: 1px solid #0064b7;
    border-radius: 5px;
    cursor: pointer;

}
.tag:after {
    position: absolute;
    right: 8px;
    color: #b4252d;
    content: '\00d7';
}
</style>

