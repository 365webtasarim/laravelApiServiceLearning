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
                                                    <h1>Bekleyen Yorumlar</h1>
                                                </div>

                                            </div>
                                        </div><!-- /.container-fluid -->
                                    </section>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card">

                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table class="table table-striped projects">
                                                        <thead>
                                                        <tr>

                                                            <th style="width: 20%">
                                                               Gönderen
                                                            </th>
                                                            <th style="width: 20%">
                                                                Yorumu
                                                            </th>
                                                            <th style="width: 20%">
                                                                Tarih
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                    <tbody>
                                                    @foreach($comments as $comment)
                                                        <tr>

                                                            <td>
                                                                {{$comment->name}}
                                                            </td>
                                                            <td>
                                                                {{$comment->comment}}
                                                            </td>

                                                            <td>
                                                                {{$comment->created_at}}
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

