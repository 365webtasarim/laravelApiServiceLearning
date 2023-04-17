<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slider Düzenle') }}
        </h2>
    </x-slot>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Slider Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="app" method="post" action="{{ route('sliderCreate') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Başlık</label>
                                    <input type="text" class="form-control" name="title"  >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Url</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Url</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>


                            <UploadPhoto
                                :single="false"
                                title="Anasayfa Slider"
                                help="Fotoğrafları Seçiniz"
                                :msg="Deneme"
                            >

                            </UploadPhoto>
                            <input type="submit"
                                   class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-100"
                                   value="Kaydet">


                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <x-slot name="js">

        $(document).ready(function () {
        CKEDITOR.replace('editor');

        });

    </x-slot>

</x-app-layout>
