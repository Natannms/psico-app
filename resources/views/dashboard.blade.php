<x-app-layout>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="w-full flex justify-end">
            <input type="text" id="textoParaCopiar" value="{{url('/')}}/invited-by/{{Auth::user()->email}}" style="position: absolute; left: -9999px;">
            <button class="bg-blue-700 p-2 font-medium text-white rounded-md hover:bg-white hover:text-blue-500  border border-blue-500 flex items-center gap-4 transition-colors" id="btnCpInvite">
                <span>Copiar link de convite</span>
                <span class="material-symbols-outlined">
                    send
                </span>
            </button>
            <script>
                document.getElementById("btnCpInvite").addEventListener("click", function() {
                    var campoTexto = document.getElementById("textoParaCopiar");
                    campoTexto.select();

                    try {
                        document.execCommand("copy");
                        alert("Texto copiado para a área de transferência: " + campoTexto.value);
                    } catch (err) {
                        alert("Não foi possível copiar o texto. Pressione Ctrl+C para copiar manualmente.");
                    }
                });
            </script>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-clients :clients="$data['clients']" />
            </div>
        </div>
    </div>
</x-app-layout>
