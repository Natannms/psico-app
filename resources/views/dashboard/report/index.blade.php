<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relatório do agendamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form class="w-full mx-auto sm:px-6 lg:px-8" method="POST" action="/report/update/{{ $report->id }}">
            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <button type="submit" class="bg-blue-500 p-2 text-center rounded-xl text-white font-bold ">Atualizar
                    relatório</button>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @csrf
                @if ($report->report !== '')
                    <textarea name="report" id="summernote">
                        {{ $report->report }}
                    </textarea>
                @else
                    <p>Não há informações para esse relatório.</p>
                @endif
                <script>
                    $('#summernote').summernote({
                        placeholder: 'Hello stand alone ui',
                        tabsize: 2,
                        height: 1200,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                </script>
            </div>
        </form>
    </div>
</x-app-layout>
