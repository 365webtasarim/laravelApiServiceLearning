<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeri') }}
        </h2>
    </x-slot>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Galeri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('galleryCreate')}}" class="btn btn-success w-100">
                                Fotoğraf Ekle
                            </a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">

                    <div class="image_list_container">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="order"><i class="fas fa-sort"></i></th>
                            <th class="w50">#id</th>
                            <th>Başlık</th>
                            <th>Görsel</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody class="sortable" data-url="{{route('galleryShort')}}">

                        <?php foreach($items as $item){ ?>

                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="order"><i class="fas fa-sort"></i></td>
                            <td class="w50 text-center">#<?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>

                            <td class="w100 text-center">
                                <img
                                    width="100"
                                    src="{{$item->image_path}}"
                                    alt="<?php echo $item->image_path; ?>"
                                    class="img-responsive">
                            </td>

                            <td class="w100 text-center">
                                <button
                                    data-url="{{route('galleryDelete',$item->id)}}"
                                    class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                            </td>
                        </tr>

                        <?php } ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="order"><i class="fas fa-sort"></i></th>
                            <th class="w50">#id</th>
                            <th>Başlık</th>
                            <th>Görsel</th>
                            <th>İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>

    <script>
        $(document).ready(function () {
        $(".sortable").sortable();
        $(".image_list_container").on("sortupdate", '.sortable',  function(event, ui){

            var $data = $(this).sortable("serialize");
            var $data_url = $(this).data("url"); // get the url of the page
            $.post($data_url, {data : $data}, function(response){})

        })

            $(".image_list_container").on('click', '.remove-btn', function () {

                var $data_url = $(this).data("url");
                Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Bu işlemi geri alamayacaksınız!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Sil!',
                    cancelButtonText : "Hayır"
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: $data_url,
                            type: 'DELETE',
                            dataType: 'json',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                window.location.reload(true);
                            },
                            error: function(response) {
                                console.log(response);
                            }
                        });
                    }
                });

            })
        });
    </script>


</x-app-layout>

