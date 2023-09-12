<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        CLIENTES
    </h1>
</div>

<div class="bg-gray-200 bg-opacity-25 flex flex-col">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Data
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Frequência
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status de pagamento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        relatório
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $agendamento->date }}
                        </th>
                        <td class="px-6 py-4">
                            @switch($agendamento->occurrency)
                                @case('7')
                                    Semanal
                                    @break
                                @case('15')
                                    Quinzenal
                                    @break
                                @case('30')
                                    Mensal
                                    @break
                                @default

                            @endswitch
                        </td>
                        <td class="px-6 py-4"
                            {{ $agendamento->isPaied == 'true' ? 'text-green-500' : 'text-red-500' }}">
                            @if ($agendamento->isPaied == 'paid')
                                Pago
                            @endif
                            @if ($agendamento->isPaied == 'pending')
                                Pendente
                            @endif
                            @if ($agendamento->isPaied == 'canceled')
                                Cancelado
                            @endif
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <a  class="p-2 border border-blue-600 hover:bg-blue-600 hover:text-white text-black text-center rounded"
                                href="/report/{{ $agendamento->id }}"> Relatórios </a>
                            <a class="p-2 border border-blue-600 hover:bg-blue-600 hover:text-white text-black text-center rounded"
                                href="/atestado/generate/{{ $agendamento->id }}"> Atestado médico</a>
                            <a class="p-2 border border-blue-600 hover:bg-blue-600 hover:text-white text-black text-center rounded"
                                href="/recibo/generate/{{ $agendamento->id }}"> Recibo </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
