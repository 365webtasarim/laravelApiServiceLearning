<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makale Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="app" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="default-input" class="block mb-2 text-sm font-medium ">Kategori</label>
                            <select name="cat" id="" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($cat as $category)
                                    <option value="{{$category->id}}"  @selected( in_array($category->id, array_column($makale->catagory->toArray(), 'id'), true) )> {{$category->title}}</option>
                                @endforeach
                            </select>

                        </div>
                        <slugify
                            @if(isset($makale))
                            old="{{$makale->title}}"
                            old-slug="{{$makale->slug}}"
                            @endif
                            check-url="makale"
                        ></slugify>
                        <div class="mb-6">
                            <label for="default-input" class="block mb-2 text-sm font-medium ">İçerik</label>
                            <textarea id="editor" name="editor">
                                {{$makale->description}}
                            </textarea>
                        </div>
                        <div class="mb-6">
                            <label for="embed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Video Url</label>
                            <input type="text" name="embed" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ $makale->embed? $makale->embed :null }}">

                        </div>
                        <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Durumu</label>
                            <select id="status" name="status" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                               <option value="1" {{ $makale->status?'selected':null }}>Aktif</option>
                                <option value="0" {{ !$makale->status?'selected':null }}>Pasif</option>
                            </select>
                        </div>
                        <tags taglar="{{ $tags}}">

                        </tags>
                        <uploadphoto
                                @if(isset($makale) && $makale->image != "")
                                old="{{$makale->image}}"
                                @endif
                            ></uploadphoto>

                        <input type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-100" value="Kaydet">


                    </form>

                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('editor');

            });
    </script>
</x-app-layout>
