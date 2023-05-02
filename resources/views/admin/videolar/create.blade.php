<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Video Ekle') }}
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
                    <h3 class="card-title">Video Ekle</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="app" method="POST" action="{{route('VideoCreatePost')}}">
                        @csrf
                        <div class="mb-6">
                            <label for="default-input" class="block mb-2 text-sm font-medium ">Kategori</label>
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach($cat as $category)
                                    <li class="w-full">
                                        <div class="flex items-center pl-3">
                                            <input id="vue-checkbox-list"
                                                   type="checkbox"
                                                   name="cat[]" value="{{$category->id}}"
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="vue-checkbox-list"
                                                   class="w-full m-2 text-sm font-medium text-gray-900 dark:text-gray-500">{{$category->title}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <slugify
                            @if(isset($makale))
                            old="{{$makale->title}}"
                            old-slug="{{$makale->slug}}"
                            @endif
                            check-url="sohbetler"
                        ></slugify>
                        <div class="mb-6">
                            <label for="default-input" class="block mb-2 text-sm font-medium ">İçerik</label>
                            <textarea id="editor" name="editor"></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="embed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Video Url</label>
                            <input type="text" name="embed" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                        </div>
                        <div class="mb-6">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Durumu</label>
                            <select id="status" name="status" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="1" selected>Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <tags taglar="">

                        </tags>
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

