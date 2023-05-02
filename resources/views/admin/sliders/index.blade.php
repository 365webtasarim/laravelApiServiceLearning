<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('sliderCreate')}}" class="btn btn-success w-100">
                                Yeni Oluştur
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


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>İD</th>
                                <th>BAŞLIK</th>
                                <th>CİHAZ</th>
                                <th>TARİH</th>
                                <th>İŞLEMLER</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>İD</th>
                                <th>BAŞLIK</th>
                                <th>CİHAZ</th>
                                <th>TARİH</th>
                                <th>İŞLEMLER</th>
                            </tr>
                            </tfoot>
                        </table>

                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
        $('#example2').DataTable({
        "paging": true,
        dom: 'Bfrtip',
        ajax: {
        url: "{{route('allSliders')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: "POST",
        dataSrc: "data"
        },
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/tr.json',
        },
        columns: [
        { data: 'id' },
        { data: 'title' },
        { data: 'device' },
        { data: 'created_at' },
        { data: 'action' },

        ],
        buttons: [
        'pageLength'
        ],
        "order": [[ 0, "desc" ]],
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        "autoWidth": false,
        "responsive": true,
        });
        $('#delete-items').on('click', function(e){
        var r = confirm("Seçilenleri silmek istediğinize emin misiniz ?");
        if (r == true) {
        console.log("You pressed OK!");
        var form = $('#selected-form');
        $.each(rows_selected, function(index, rowId){
        $(form).append($('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId));
        });
        var formSelectData=$(form).serialize();
        form.submit();
        }
        });
    </x-slot>

</x-app-layout>

