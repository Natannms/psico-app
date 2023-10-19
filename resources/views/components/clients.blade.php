<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                            <a class="p-2 bg-white text-green-800 border border-green-800 hover:bg-green-800 hover:text-white font-bold text-center rounded flex gap-4 items-center" href="https://wa.me/{{$client->userMetadata->phone}}">
                                whatsapp
                                <span class="material-symbols-outlined">
                                    chat
                                    </span>
                            </a>
                            <a class="p-2 bg-purple-800 hover:bg-white border border-purple-800 hover:text-purple-800 text-white font-bold text-center rounded" href="mailto:{{$client->email}}">
                                <span class="material-symbols-outlined">
                                    mail
                                    </span>
                            </a>
                            <a class="p-2 bg-purple-800 hover:bg-white border border-purple-800 hover:text-purple-800 text-white font-bold text-center rounded" href="/dashboard/agendamentos/{{$client->id}}/cliente">
                                <span class="material-symbols-outlined">
                                    auto_stories
                                    </span>
                            </a>
                            <a data-tooltip-target="tooltip-default" class="p-2 bg-purple-800 hover:bg-white border border-purple-800 hover:text-purple-800 text-white font-bold text-center rounded" href="/dashboard/agendamentos/{{$client->id}}/cliente">
                                <span class="material-symbols-outlined">
                                    edit_calendar
                                    </span>
                            </a>
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-800 hover:bg-white border border-gray-800 hover:text-gray-800 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Tooltip content
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
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
