<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anasayfa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bekleyen Yorumlar
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex items-center">
                        <div class="relative w-full  overflow-y-scroll bg-white border border-gray-100 rounded-lg dark:bg-gray-700 dark:border-gray-600 h-96">
                            <ul>
                                @foreach($comments as $comment)
                                <li class="border-b border:gray-100 dark:border-gray-600">
                                    <a href="{{route('editYorumlar',$comment->id)}}" class="flex items-center w-full px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">{{$comment->name}}</span>:{{$comment->comment}}</p>
                                            <span class="text-xs text-blue-600 dark:text-blue-500">{{$comment->created_at}}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
