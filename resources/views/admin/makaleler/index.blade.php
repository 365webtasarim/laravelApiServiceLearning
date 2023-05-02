<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makaleler') }}
        </h2>
    </x-slot>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Sohbetler</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">    <a href="{{route('SohbetCreate')}}" class="btn btn-success">
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
                            <th>#ID</th>
                            <th>BAŞLIK</th>
                            <th>HİT</th>
                            <th>İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>BAŞLIK</th>
                            <th>HİT</th>
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
        drawCallback: function() {
         $('.form-control').addClass('bg-dark');
        },
        ajax: {
        url: "{{route('getPost','post')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: "POST",
        dataSrc: "data"
        },
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/tr.json',
        },
        columns: [
        { data: 'id'},
        { data: 'title',"width": "70%" },
        { data: 'hit' },
        { data: 'action' },

        ],
        "order": [[ 0, "desc" ]],
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
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

