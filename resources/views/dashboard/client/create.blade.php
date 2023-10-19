<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ultimas consultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-schedules :agendamentos="$data['agendamentos']" /> --}}
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('schedule.store') }}" class="">
                    @csrf
                    <div class="w-full p-6 flex gap-8">
                        @if (!array_key_exists('client_id', $data))
                            <div class="w-96">
                                <div>
                                    <x-label for="name" value="{{ __('Name') }}" />
                                    <x-input id="name" class="block mt-1 w-96" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" class="block mt-1 w-96" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <x-input id="password" class="block mt-1 w-96" type="password" name="password"
                                        required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-input id="password_confirmation" class="block mt-1 w-96" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                </div>

                                <div>
                                    <x-label for="cpf" value="{{ __('CPF') }}" />
                                    <x-input id="cpf" class="block mt-1 w-96" type="text" name="cpf"
                                        :value="old('cpf')" required autofocus autocomplete="cpf" />
                                </div>

                            </div>
                            <div class="w-96">
                                <div>
                                    <x-label for="phone" value="{{ __('Telefone') }}" />
                                    <x-input id="phone" class="block mt-1 w-96" type="text" name="phone"
                                        :value="old('phone')" required autofocus autocomplete="name" />
                                </div>
                                <div class="mt-2">
                                    <x-label for="cep" value="{{ __('CEP') }}" />
                                    <x-input id="cep" class="block mt-1 w-96" type="text" name="cep"
                                        :value="old('cep')" required autofocus autocomplete="cep" />
                                </div>

                                <div class="w-full hidden" id="addres-data">
                                    <div class="mt-2">
                                        <x-label for="logradouro" value="{{ __('Logradouro') }}" />
                                        <x-input id="logradouro" class="block mt-1 w-96" type="text"
                                            name="logradouro" required />
                                    </div>

                                    <div class="mt-2">
                                        <x-label for="complemento" value="{{ __('Complemento') }}" />
                                        <x-input id="complemento" class="block mt-1 w-96" type="text"
                                            name="complemento" />
                                    </div>

                                    <div class="mt-2">
                                        <x-label for="bairro" value="{{ __('Bairro') }}" />
                                        <x-input id="bairro" class="block mt-1 w-96" type="text" name="bairro"
                                            required />
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="w-96 ">
                            <div class="w-full hidden" id="addres-data2">
                                @if (!array_key_exists('client_id', $data))
                                    <div class="mt-2">
                                        <x-label for="localidade" value="{{ __('Localidade') }}" />
                                        <x-input id="localidade" class="block mt-1 w-48" type="text"
                                            name="localidade" required />
                                    </div>

                                    <div class="mt-2">
                                        <x-label for="uf" value="{{ __('UF') }}" />
                                        <x-input id="uf" class="block mt-1 w-48" type="text"
                                            name="uf" required />
                                    </div>

                                    <div class="mt-2">
                                        <x-label for="ddd" value="{{ __('DDD') }}" />
                                        <x-input id="ddd" class="block mt-1 w-48" type="text"
                                            name="ddd" required />
                                    </div>
                                @endif
                            </div>
                            @if (array_key_exists('client_id', $data))
                                <div class="mt-2">
                                    <input type="hidden" name="client_id", value="{{ $data['client_id'] }}">
                                </div>
                            @endif
                            @if ($data['withSchedule'])
                                <div class="mt-2">

                                    <x-label for="date" value="{{ __('Data e Hora') }}" />
                                    <x-input id="date" class="block mt-1 w-48" type="datetime-local"
                                        name="date" required />
                                </div>
                                <div class="mt-2">
                                    <x-label for="occurrency" value="{{ __('Frequência') }}" />
                                    <select name="occurrency" id="occurrency"
                                        class="border-gray-300 w-48 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="1">Agendamento único</option>
                                        <option value="4">Semanalmente</option>
                                        <option value="1">Uma vez ao mês</option>
                                        <option value="2">Quinzenal</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-center gap-8 mb-10">
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature() && !array_key_exists('client_id', $data))
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Salvar</button>
                        </div>
                    </div>
                </form>
                {{-- @if (!$data['withSchedule'])
                @else
              @endif --}}

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const cepInput = document.getElementById('cep');
                        const logradouroInput = document.getElementById('logradouro');
                        const complementoInput = document.getElementById('complemento');
                        const bairroInput = document.getElementById('bairro');
                        const localidadeInput = document.getElementById('localidade');
                        const ufInput = document.getElementById('uf');
                        const dddInput = document.getElementById('ddd');

                        cepInput.addEventListener('blur', () => {
                            const cep = cepInput.value.replace(/\D/g, '');

                            if (cep.length !== 8) {
                                document.getElementById('addres-data').style.display = 'none'
                                document.getElementById('addres-data2').style.display = 'none'
                                return;
                            }

                            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                                .then(response => response.json())
                                .then(data => {
                                    if (!data.erro) {
                                        logradouroInput.value = data.logradouro;
                                        complementoInput.value = data.complemento;
                                        bairroInput.value = data.bairro;
                                        localidadeInput.value = data.localidade;
                                        ufInput.value = data.uf;
                                        dddInput.value = data.ddd;

                                        document.getElementById('addres-data').style.display = 'block'
                                        document.getElementById('addres-data2').style.display = 'block'
                                    } else {
                                        document.getElementById('addres-data').style.display = 'none'
                                        document.getElementById('addres-data2').style.display = 'none'
                                        alert('CEP não encontrado');
                                    }
                                })
                                .catch(error => {
                                    document.getElementById('addres-data').style.display = 'none'
                                    document.getElementById('addres-data2').style.display = 'none'
                                    console.error('Erro ao buscar CEP:', error);
                                });
                        });
                    });
                </script>
            </div>


        </div>
    </div>
</x-app-layout>
