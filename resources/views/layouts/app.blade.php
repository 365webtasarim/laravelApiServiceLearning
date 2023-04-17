@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
@stop

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
<script>
    {{ $js??null }}
</script>
@stop
@section('content')
    {{ $slot }}

@endsection

