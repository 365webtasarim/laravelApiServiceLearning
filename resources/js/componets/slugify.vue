<template>
<div>
  <div class="form-group required">
    <label for="title" class="control-label">
      Başlık<sup>*</sup>
    </label>
      <div class="mb-6">
      <input type="text" name="title" @change="checkSlug()" @keyup="changeTitle" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required v-model="title">
    </div>
  </div>
  <div class="form-group required">
    <label for="title" class="control-label">
      Slug<sup>*</sup>
    </label>
      <div class="mb-6">
      <input type="text" name="slug-preview" @change="checkSlug()" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required v-model="slug">
      <span class="help" :class="status?'is-success':'is-danger' ">
        <img v-if="loading" src="/img/loading.gif" alt="loader">
        /{{slugify}}
        </span>
    </div>
  </div>
    <input type="hidden" id="slug-status" :value="status?'true':'false'">
    <input type="hidden" name="slug" :value="slugify">
</div>
</template>

<script>
  import slugify from 'slugify';
  import Switches from 'vue-switches';
  export default {
    components: {Switches,slugify},
    props: {
      prefix:{type: String,required: false,default: () => {return "title"}} ,
      old:{type: String,required: false,default: () => {return ""}},
      oldSlug:{type: String,required: false,default: () => {return ""}},
      checkUrl:{type: String,required: false,default: () => {return "article"}}
    },
    data: () => {
      return {
        title:'',
        slug:'',
        status:false,
        loading:false,
      }
    },
    methods: {
      changeTitle(){
        this.slug=slugify(this.title);
      },
      checkSlug(){
        const vm = this;
        vm.loading=true;
        if(vm.slug==vm.oldSlug){
          vm.status=true;
          vm.loading=false;
        }else{
          axios.post('/admin/'+vm.checkUrl+'/check-slug', {slug: vm.slug})
          .then(function (response) {
            if(response.data<=0){
              vm.status=true;
            }else{
              vm.status=false;
            }
            vm.loading=false;
          }).catch(function (error) {
            alert(error);
            vm.loading=false;
          });
        }
      }
    },
    computed: {
      slugify: function () {
        var slug = slugify(this.slug,{
          replacement: '-',
          remove: /[$*+~(?)'"!\^%:@]/g,
          lower: true
        });
        return slug;
      }
    },
    beforeMount(){
      this.title=this.old;
      this.slug=this.oldSlug;
    },
    mounted(){
      this.checkSlug();
      console.log('Start slugify');
    }
  }
</script>
<style lang="scss">
.help{
  font-weight: bold;
}
.is-danger{
  color:red;
}
.is-success{
  color:green;
}
</style>
