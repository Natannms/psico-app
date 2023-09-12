<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>RECIBO - {{Auth::user()->name}}</title>
</head>

<body class="bg-white text-lg">
    <div class="bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#F589AC" fill-opacity="1"
                d="M0,64L48,53.3C96,43,192,21,288,21.3C384,21,480,43,576,85.3C672,128,768,192,864,186.7C960,181,1056,107,1152,69.3C1248,32,1344,32,1392,32L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
        <div class="flex flex-col items-center">
            <header class="bg-red-500">
                <img class="w-" src="{{ url('storage/logos') }}/logo-{{ Auth::user()->id }}.jpg" alt="">
            </header>
            <div class="flex flex-col ">
                <p>
                    Eu, {{ Auth::user()->name }}, portador do CPF {{ Auth::user()->userMetadata->cpf }}, recebi a quantia de
                </p>
                <p>
                    <strong>R$ <input type="text" class="border-b border-black w-24" placeholder="Valor"></strong>
                </p>
                <p>
                    (Valor por extenso)
                </p>
                <p>
                    referente a:
                </p>
                <p>
                    <span class="text-[#F589AC]">
                        <input type="text" class="border-b border-black w-full" placeholder="Motivo do pagamento">
                    </span>
                </p>

                <div class="flex flex-col items-center gap-8 pt-10">
                    <div>
                        <strong class="text-[#F589AC]">{{ Auth::user()->userMetadata->localidade }}
                            {{ date('d/m/Y H:m') }}</strong>
                    </div>

                    <div>
                        <strong class="text-[#F589AC]">{{ Auth::user()->name }} - CPF: {{ Auth::user()->userMetadata->cpf }}
                        </strong>
                    </div>
                    <img class="w-48" src="{{ url('storage/seals') }}/carimbo-{{ Auth::user()->id }}.jpg"
                        alt="">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
