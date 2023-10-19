<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar imagens') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex  flex-col gap-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col justify-around p-10 gap-4">
                @csrf
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
                <div class="flex w-10/12 border rounded p-4 justify-between">
                    <form action="{{ route('upload.logo') }}" method="POST" enctype="multipart/form-data">


                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="logo">Atualizar logo</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="logo" name="logo" type="file">
                        </div>

                        <button type="submit"
                            class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-300">
                            Enviar Logo
                        </button>
                    </form>
                    <div>
                        @if (Auth::check())
                            @if (Auth::user()->userMetadata)
                                @if (Auth::user()->userMetadata->logo)
                                    <img src="{{ url('storage') }}/{{ Auth::user()->userMetadata->logo }}"
                                        alt="Logo" class="mt-2  w-48">
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
                <div class="flex w-10/12 border rounded p-4 justify-between">
                    <form action="{{ route('upload.seal') }}" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="seal">Atualizar carimbo</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="seal" name="seal" type="file">
                        </div>

                        <button type="submit"
                            class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-300">
                            Enviar carimbo
                        </button>
                    </form>
                    <div>
                        @if (Auth::check())
                            @if (Auth::user()->userMetadata)
                                @if (Auth::user()->userMetadata->seal)
                                    <img src="{{ url('storage') }}/{{ Auth::user()->userMetadata->seal }}"
                                        alt="seal" class="mt-2 w-48">
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
