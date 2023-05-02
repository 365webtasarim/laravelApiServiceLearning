<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fotoğraf Oluşturma') }}
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
                    <h3 class="card-title">Fotoğraf Oluşturma</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="app" method="POST" action="{{route('galleryCreatePost')}}">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <div id="dropzone" method="post" class="dropzone">
                                    <div class="dz-message">
                                        <h3 class="m-h-lg">Yüklemek istediğiniz dosyaları buraya sürükleyiniz</h3>
                                        <p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyiniz yada
                                            buraya tıklayınız)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Başlık</label>
                            <input type="text" name="title" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="">
                        </div>
                        <div class="mb-6">
                            <label for="desciription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Açıklama</label>
                            <input type="text" name="desciription" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="">
                        </div>




                        <input type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-100" value="Kaydet">


                    </form>
                </div>

            </div>
        </div>
    </div>
    <x-slot name="js">
        var uploadedDocumentMap = {}
        Dropzone.options.dropzone = {
        url: '{{ route('media.storeMedia') }}',
        maxFilesize: 20, // MB
        uploadMultiple: false,
        parallelUploads: true,
        maxFiles: 1, // Count
        maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
        },
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
        $('form').find('input[name="file_old"]').remove()
        $('form').append('<input type="hidden" name="media" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name

        },
        removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
        name = file.file_name
        } else {
        name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="file"][value="' + name + '"]').remove()
        },
        }
        $(document).ready(function () {
        CKEDITOR.replace('editor');

        });

    </x-slot>


</x-app-layout>
