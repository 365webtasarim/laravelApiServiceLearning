<template>
    <div id="gallery-manager">
        <div class="col-lg-3 col-sm-12 col-12">
            <div class="upload-area" v-if="!editArea">
                <h4>{{title}}</h4>
                <div class="input-group">
                    <label class="input-group-btn">
                    <span class="btn btn-primary">
                        <span v-html="btnText"></span>
                        <input type="file" style="display: none;"  @change="FileChange" :multiple="single == false">
                    </span>
                    </label>
                    <input type="text" class="form-control" readonly :value="selectedFiles.length + ' File selected'">
                </div>
                <a class="btn btn-success pull-right mt-10" @click="store()" :disabled="selectedFiles.length == 0">Upload</a>
                <span class="help-block">{{help}}</span>
            </div>
            <div class="edit-area" v-if="editArea">
                <h4>Edit Media Info</h4>
                <div class="form-group"
                     v-for="(item,key,index) in images[editItem]"
                     v-if="key != 'src'"
                >
                    <label class="uppercase">{{key}}</label>
                    <input type="text" class="form-control"  v-model="images[editItem][key]">
                </div>
                <span class="btn btn-block btn-info btn-flat" @click="editArea=false"> Save </span>
            </div>
        </div>
        <div class="col-lg-9 col-sm-12">
            <div class="preview-area" :class="{listView:list}">
                <draggable v-model="images" tag="figure">
                    <template v-for="(image, index) in images" :key="index" #item="{element}">

                        <img :src="image.src">
                        <div class="actions">
                            <i v-if="fields.length > 0" class="edit fa fa-pencil" @click="edit(index)"></i>
                            <i class="show fa fa-eye" :href="image.src" :data-fancybox="prefix"></i>
                            <i class="delete fa fa-close" @click="images.splice(index, 1)"></i>
                        </div>

                    </template>
                </draggable>
                <h4 v-if="images.length==0" class="no-media">Please Select Media</h4>
            </div>
        </div>
        <div class="clearfix"></div>
        <input type="hidden" :name="prefix" v-model="results">
    </div>
</template>

<script>
import draggable from 'vuedraggable'
export default {
    components: {
        draggable,
    },
    props: {
        list: {type: Boolean,required: false,default: () => {return false}} ,
        single: {type: Boolean,required: false,default: () => {return true}} ,
        prefix: {type: String,required: false,default: () => {return "media"}} ,
        title: {type: String,required: false,default: () => {return "Upload Photo"}} ,
        btnText: {type: String,required: false,default: () => {return "Browse &hellip;"}} ,
        help: {type: String,required: false,default: () => {return ""}} ,
        old: {type: Array,required: false,default: () => {return null}},
        fields: {type: Array,required: false,default: () => {return []}}
    },
    data: () => {
        return {
            editArea:false,
            editItem:null,
            images: [],
            selectedFiles:[],
            progress:0
        }
    },
    methods: {
        FileChange(e){
            const vm = this;
            vm.selectedFiles=[];
            if (!e.target.files.length) return;
            Array
                .from(Array(e.target.files.length).keys())
                .map(x => {
                    vm.selectedFiles.push(e.target.files[x]);
                });
        },
        store(){
            const vm = this;
            if(vm.selectedFiles.length==0){
                toast.info('Please select photo.');
                return;
            }
            var data = new FormData();
            for (var i = 0; i < vm.selectedFiles.length; i++) {
                let file = vm.selectedFiles[i];
                data.append('images[' + i + ']', file, file.name);
            }
            var config = {
                headers: { 'content-type': 'multipart/form-data' },
                onUploadProgress: function(progressEvent) {
                    var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                    vm.progress=percentCompleted;
                }
            };
            axios.post('/admin/media/store', data, config)
                .then(function (r) {
                    toast.success('Upload Success.')
                    vm.selectedFiles=[];
                    vm.concatImages(r.data);
                })
                .catch(function (e) {
                    toast.error('Error: Please Refresh Page!');
                });
        },
        concatImages(data){
            const vm = this;
            if(vm.single){
                vm.images=[];
            }
            for(var i = 0, len = data.length; i < len; i++) {
                vm.images.push({
                    src:data[i]
                });
            }
            vm.addField();
        },
        edit(index){
            this.editItem=index;
            this.editArea=true;
        },
        addField(){
            const vm=this;
            vm.images.forEach(function(media,index){
                vm.fields.forEach(function(field,index){
                    var result;
                    if (media[field] !== undefined) {
                        result = true;
                    }else{
                        media[field]=""
                    }
                })
            });
        }
    },
    computed: {
        results: function () {
            if(this.single){
                if(this.images.length>0){
                    // console.log(this.images[0]);
                    return this.images[0].src;
                }
            }else{
                if(this.images.length>0){
                    return JSON.stringify(this.images);
                }else{
                    return null;
                }
            }
        }
    },
    mounted(){
        if(this.old!=null){
            this.images=this.old;
        }
        this.addField();
    }
}
</script>


<style lang="scss">
#gallery-manager{
    background-color: #ecf0f5;
    display: block;
    padding: 10px;
    margin:10px 0px;
    box-shadow: 0px 2px 3px black;
    .preview-area{
        display: block;
        position: relative;
        figure{
            margin:0px 5px 10px 5px;
            display: inline-block;
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 1px 2px black;
            position: relative;
            img{
                height: 120px;
                border:1px solid #ecf0f5;
            }
            .actions{
                position: absolute;
                top:0px;
                i{
                    color: white;
                    padding: 5px;
                    display: block;
                    cursor:pointer;
                }
                .edit{
                    background-color:#3c8dbc;
                }
                .show{
                    background-color:#00a65a;
                }
                .delete{
                    background-color:#dd4b39;
                }
            }
        }
        &.listView{
            figure{
                display:block;
                width:100%;
                position:relative;
                img{
                    height:200px;
                }
                actions{

                }
            }
        }
    }
    .uppercase{
        text-transform:capitalize;
    }
    .no-media{
        display: block;
        width: 100%;
        text-align: center;
        line-height: 120px;
        font-size: 20px;
    }
    .edit-area{
        background-color: white;
        padding: 10px;
        margin: 0 0px 10px 0px;
    }
}
</style>
