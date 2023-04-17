<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Köşe Yazıları') }}
        </h2>
    </x-slot>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Köşe Yazıları</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">    <a href="{{route('makaleCreate')}}" class="btn btn-success w-100">
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
                        <th>TARİH</th>
                        <th>BAŞLIK</th>
                        <th>HİT</th>
                        <th>İŞLEMLER</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($makaleler as $makale)
                        <tr>
                            <th width="10%">{{$makale->created_at->format('Y/m/d')}}</th>
                            <th width="70%">{{$makale->title}}</th>
                            <th width="5%">{{$makale->hit}}</th>
                            <td width="15%">
                                <a class="btn btn-info btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Düzenle" href="{{route('yaziOku',$makale->slug)}}">
                                    <i class="fas fa-share"></i>
                                </a>
                                <a class="btn btn-success btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Düzenle" href="{{route('editMakale',$makale->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-danger btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Düzenle" onclick="$(this).find('form').submit();">
                                    <i class="fas fa-trash-alt"></i>
                                    <form method="post" action="{{route('makaleDelete',$makale->id)}}">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>TARİH</th>
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

