<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yorumlar') }}
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
                    <h3 class="card-title">Yorumlar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>TARİH</th>
                            <th>ADI</th>
                            <th>YORUM</th>
                            <th>DURUMU</th>
                            <th>İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($yorumlar as $makale)
                            <tr>
                                <th>{{$makale->created_at->format('Y/m/d')}}</th>
                                <th>{{$makale->name}}</th>
                                <th>{{$makale->comment}}</th>
                                <th>{{$makale->status?'Açık':'Kapalı'}}</th>
                                <td>

                                    <a class="btn btn-success btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Düzenle" href="yorumlar/edit/{{$makale->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                        <a class="btn btn-danger btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Düzenle" onclick="$(this).find('form').submit();">
                                            <i class="fas fa-trash-alt"></i>
                                            <form method="post" action="{{route('YorumlarDelete',$makale->id)}}">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </a>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
        $('#example2').DataTable({
        "paging": true,
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/tr.json',
        },
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    </x-slot>

</x-app-layout>

