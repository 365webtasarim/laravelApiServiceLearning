<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yorum Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form  method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tarih</label>
                            <input type="text" name="date" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ $yorum->created_at? $yorum->created_at :null }}">
                        </div>
                        <div class="mb-6">
                            <label for="post_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Yorum Yapılan Yazı</label>
                            <input type="text" name=post_name" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 disabled" disabled="disabled" value="{{ $yorum->post->title? $yorum->post->title :null }}">
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Yorum Yapan</label>
                            <input type="text" name="name" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 disabled" disabled="disabled" value="{{ $yorum->name? $yorum->name :null }}">
                        </div>
                        <div class="mb-6">
                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Yorumu</label>
                            <input type="text" name="comment" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 disabled"  disabled="disabled"  value="{{ $yorum->comment? $yorum->comment :null }}">
                        </div>
                        <div class="mb-6">
                            <label for="mail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Mail Adresi</label>
                            <input type="text" name="mail" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 disabled"  disabled="disabled"  value="{{ $yorum->mail? $yorum->mail :null }}">
                        </div>
                        <div class="mb-6">
                            <label for="ip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">İp Adresi</label>
                            <input type="text" name="ip" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 disabled"  disabled="disabled"  value="{{ $yorum->ip? $yorum->ip :null }}">
                        </div>
                        <label class="relative inline-flex items-center mr-5 cursor-pointer">
                            <input type="checkbox" name="status" value="1" class="sr-only peer" @checked($yorum->status)>
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Durumu</span>
                        </label>
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
