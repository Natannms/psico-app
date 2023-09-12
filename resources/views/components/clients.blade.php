<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Clientes
    </h1>
</div>

<div class="bg-gray-200 bg-opacity-25 flex flex-col">

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        status
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr class="bg-white border-b ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                           {{$client->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$client->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$client->userMetadata->phone}}
                        </td>
                        <td class="px-6 py-4">
                           @switch($client->status)
                               @case('enable')
                                   Ativo
                                   @break
                               @case('disable')
                                   Inativo
                                   @break

                               @default
                                   Não definido
                           @endswitch
                        </td>
                        <td class="flex gap-4">
                            <a class="p-2 bg-green-600 text-white font-bold text-center rounded" href="https://wa.me/{{$client->userMetadata->phone}}">Whatsapp</a>
                            <a class="p-2 bg-orange-600 text-white font-bold text-center rounded" href="mailto:{{$client->email}}">Enviar email</a>
                            <a class="p-2 bg-blue-600 text-white font-bold text-center rounded" href="/dashboard/agendamentos/{{$client->id}}/cliente"> Agendamentos </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-8">
            {{$clients->links()}}
        </div>
    </div>
</div>
