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

                    <form method="post" action="{{ route('sliderPostCreate') }}">

                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Başlık</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Url</label>
                                    <input type="text" class="form-control" name="url">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Cihaz</label>
                                    <select class="form-control" name="device">
                                        <option value="desktop">Desktop</option>
                                        <option value="mobile">Mobile</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Durum</label>
                                    <select class="form-control" name="status">
                                        <option value="0">Pasif</option>
                                        <option value="1">Aktif</option>
                                    </select>
                                </div>
                            </div>
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
        var uploadedDocumentMap = {}
        Dropzone.options.dropzone = {
        url: '{{ route('media.storeMedia') }}',
        maxFilesize: 2, // MB
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
        $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
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
    </x-slot>

</x-app-layout>
