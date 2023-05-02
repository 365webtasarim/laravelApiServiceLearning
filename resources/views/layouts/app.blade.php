@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dropzone.min.css') }}">
@stop

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/js/dropzone.min.js') }}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script>
    {{ $js??null }}
</script>
@stop
@section('content')
    {{ $slot }}

@endsection

