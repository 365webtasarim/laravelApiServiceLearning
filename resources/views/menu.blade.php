<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div
                        class="p-6 bg-white border-b border-gray-200 d-flex align-items-center justify-content-between">
                        <h1 class="text-lg	font-semibold">Menüyü Düzenle</h1>
                    </div>
                    <div id="app">
                        <nested/>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){

            if($('#nestable').length){
                var updateOutput = function(e){
                    var list   = e.length ? e : $(e.target),
                        output = list.data('output');
                    if (window.JSON) {
                        output.val(window.JSON.stringify(list.nestable('serialize')));
                    } else {
                        output.val('JSON browser support required for this demo.');
                    }
                };
                $('#nestable').nestable().on('change', updateOutput);
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            }
        });
    </script>


</x-app-layout>
