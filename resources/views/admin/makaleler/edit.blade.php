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
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach($cat as $category)
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="vue-checkbox-list"   @checked(search($makale->catagory,$category->id)) type="checkbox" name="cat[]" value="{{$category->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="vue-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$category->title}}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                        <slugify
                            @if(isset($makale))
                            old="{{$makale->title}}"
                            old-slug="{{$makale->slug}}"
                            @endif
                            check-url="sohbetler"
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
                        <tags taglar="{{$tags}}">

                        </tags>
                        <uploadphoto
                                @if(isset($makale) && $makale->cover != "")
                                old="{{$makale->cover}}"
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
