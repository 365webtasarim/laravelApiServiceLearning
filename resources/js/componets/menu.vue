<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <li class="dd-item" v-for="block of json" :data-id="block.id" v-bind:key="id">
                                <div class="dd-handle" @mouseover="select()">{{ block.title }}</div>
                                <div style="position: absolute;top: 5px;right: 12px;">
                                    <a @click="guncelleX(block.id)" style="float:left;margin-right:10px">
                                        <i class="fas fa-edit"></i> Güncelle</a>
                                    <a  @click="silX(block.id)"  style="float:left;">
                                        <i class="fas fa-trash"></i> Sil</a>
                                </div>
                                <template v-if="block['children']">
                                    <ol class="dd-list" >
                                        <li class="dd-item" v-for="child in block['children']" :data-id="child.id">
                                            <div class="dd-handle">{{ child.title }}</div>
                                            <div style="position: absolute;top: 5px;right: 12px;">
                                                <a  @click="guncelleX(child.id)" style="float:left;margin-right:10px">
                                                    <i class="fas fa-edit"></i> Güncelle</a>
                                                <a @click="silX(child.id)" style="float:left;">
                                                    <i class="fas fa-trash"></i> Sil</a>
                                            </div>
                                        </li>
                                    </ol>
                                </template>
                            </li>
                        </ol>
                    </div>

                </form>
            </div>


            <div class="col-lg-6">
                <div class="p-2" id="itemAdd">
                    <div class="mb-6">
                        <label for="baslik">Başlık</label>
                        <input type="text" v-model="baslik" id="baslik"
                               class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="mb-6">
                        <label for="">URL</label>
                        <input type="text" v-model="url" id="slug"
                               class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="mb-6">
                        <button  v-show="!guncelle" class="btn btn-success w-100 mt-3" @click="menuEkle()">Ekle</button>
                        <button v-show="guncelle" class="btn btn-success w-100 mt-3" @click="guncelleS()">Güncelle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success w-100 mt-3" @click="kaydet()">Kaydet</button>
</template>

<script>
import axios from "axios";


export default {
    data() {
        return {
            json: [],
            json2: '',
            baslik: '',
            url: '',
            LastId: null,
            guncelle:false,
            id:false
        }
    },
    methods: {

        guncelleX(id) {
            const findid=id;
            try {
                var newItem = {
                    "id": findid
                };
                const data = {data: newItem};
                axios.post('/menudata', data)
                    .then((response) => {
                        // window.location.reload();
                        console.log(response.data.menuler.title)
                        this.baslik=response.data.menuler.title;
                        this.url=response.data.menuler.slug;
                        this.id=response.data.menuler.id;
                        this.guncelle=true;
                    })
            } catch (e) {
                console.error(e);
            }
        },
        silX(id) {
            const findid=id;
            try {

                axios.post('/menuSil/'+findid)
                    .then((response) => {
                        alert(response.data)
                      window.location.reload();
                    })
            } catch (e) {
                console.error(e);
            }
        },
        onClick() {
            alert('deneme')
        },
        kaydet() {
            try {
                const data = {data: this.json2};
                axios.post('/menudatalar', data)
                    .then((response) => {
                        window.location.reload();
                    })
            } catch (e) {
                console.error(e);
            }
        },
        menuEkle() {
            if (this.baslik != "" && this.url != "") {
                try {
                    var newItem = {
                        "title": this.baslik,
                        "slug": this.url
                    };
                    const data = {data: newItem};
                    axios.post('/menuEkle', data)
                        .then((response) => {
                            window.location.reload();
                        })
                } catch (e) {
                    console.error(e);
                }

            }

        },
        guncelleS() {
            alert('deneme')
            if (this.baslik != "" && this.id != "") {

                try {
                    var newItem = {
                        "id": this.id,
                        "title": this.baslik,
                        "slug": this.url
                    };
                    const data = {data: newItem};
                    axios.post('/menuGuncelle', data)
                        .then((response) => {
                            window.location.reload();
                        })
                } catch (e) {
                    console.error(e);
                }

            }

        },
        updateOutput(e) {
            var list = e.length ? e : $(e.target), output = list.data('output');
            if (window.JSON) {
                this.json = JSON.parse(JSON.stringify(list.nestable('serialize')));
            } else {
                this.json = 'JSON browser support required for this demo.';
            }
        },
        select() {
            this.json2 = $('.dd').nestable('serialize');
            $('.dd-empty').hide();
        }

    },
    mounted() {
        try {
            //   const res = axios.get(`/menudata`);
            const res = axios.get('/menudatalar')
                .then((response) => {
                    this.LastId =0;
                    var ShareInfoLength =response.data.length;
                    for(var i=0; i<ShareInfoLength; i++)
                    {
                        this.LastId+=(Object.keys(response.data[i]).length);
                    }
                    //  this.json = window.JSON.stringify(response.data);
                    this.json = JSON.parse(JSON.stringify(response.data));
                    console.log(this.json);
                    $('#nestable').nestable({
                        maxDepth: 2,
                    });
                    $('.dd-empty').hide();
                })
        } catch (e) {
            console.error(e);
        }

    },
    created() {

    }
}
</script>

<style>

.dd {
    position: relative;
    display: block;
    margin: 0;
    padding: 0;
    list-style: none;
    font-size: 13px;
    line-height: 20px;
}

.dd-list {
    display: block;
    position: relative;
    margin: 0;
    padding: 0;
    list-style: none;
}

.dd-list .dd-list {
    padding-left: 30px;
}

.dd-collapsed .dd-list {
    display: none;
}

.dd-item,
.dd-empty,
.dd-placeholder {
    display: block;
    position: relative;
    margin: 0;
    padding: 0;
    min-height: 20px;
    font-size: 13px;
    line-height: 20px;
}

.dd-handle {
    display: block;
    height: 30px;
    margin: 5px 0;
    padding: 5px 10px;
    color: #333;
    text-decoration: none;
    font-weight: bold;
    border: 1px solid #ccc;
    background: #fafafa;

    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.dd-handle:hover {
    color: #2ea8e5;
    background: #fff;
}

.dd-item > button {
    display: block;
    position: relative;
    cursor: pointer;
    float: left;
    width: 25px;
    height: 20px;
    margin: 5px 0;
    padding: 0;
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
    border: 0;
    background: transparent;
    font-size: 12px;
    line-height: 1;
    text-align: center;
    font-weight: bold;
}

.dd-item > button:before {
    content: '+';
    display: block;
    position: absolute;
    width: 100%;
    text-align: center;
    text-indent: 0;
}

.dd-item > button[data-action="collapse"]:before {
    content: '-';
}

.dd-placeholder,
.dd-empty {
    margin: 5px 0;
    padding: 0;
    min-height: 30px;
    background: #f2fbff;
    border: 1px dashed #b6bcbf;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.dd-empty {
    border: 1px dashed #bbb;
    min-height: 100px;
    background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
    -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
    linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel {
    position: absolute;
    pointer-events: none;
    z-index: 9999;
}

.dd-dragel > .dd-item .dd-handle {
    margin-top: 0;
}

.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
    box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
}
</style>
