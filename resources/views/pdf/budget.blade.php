<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Propo$ta.app</title>
  <link rel="stylesheet" href="/assets/tailwind.css">
</head>

<body>
  <div class="m-12 p-2 items-center align-middle w-full">

    <div class="grid grid-flow-row grid-cols-2 grid-rows-1 gap-1 items-center">
        <div>
          <img class="ml-3 w-32" src="/assets/logo-1.webp" alt="Logo">
          <h4 class="text-sm text-blue-400 mt-4">Transforme sua ideia em aplicativo!</h4>
      </div>

      <div class="absolute right-14 top-8 flex flex-col gap-1 mr-8">

        <div class="inline-flex flex-row gap-1 text-sm font-medium text-blue-900">
          <img src="/assets/telephone.svg" alt="Telefone fixo">
          <p>(41) 0000.0000</p>
        </div>

        <div class="inline-flex flex-row gap-1 text-sm font-medium text-blue-900">
          <img src="/assets/whatsapp.svg" alt="ehatsapp">
          <p>(41) 00000.0000</p>
        </div>

        <div class="inline-flex flex-row gap-1 text-sm font-medium text-blue-900">
          <img src="/assets/email.svg" alt="E-mail">
          <p>email@teste.dev.br</p>
        </div>

        <div class="inline-flex flex-row gap-1 text-sm font-medium text-blue-900">
          <img src="/assets/globe.svg" alt="Site">
          <p>teste.dev.br</p>
        </div>

        <div class="mt-10 leading-tight">
          <p class="text-blue-900 font-medium">ORÇAMENTO Nº {{ $budget->present()->number }}</p>
          <span class="text-xs ">{{ $budget->present()->date }}</span>
        </div>

        <div class="mt-4 leading-tight">
          <span class="text-xs ">Cliente</span>
          <p class="text-blue-900 font-medium">{{ $budget->customer['name'] }}</p>
          <span class="text-xs">{{ $budget->customer['address']['city'] }}/{{ $budget->customer['address']['state'] }}</span>
        </div>
      </div>
  </div>
      <div class="block gap-1 mt-32 items-center">
        <table class="table-auto">
        <thead class="w-screen items-center">
          <tr class="flex gap-3 w-auto">
            <th class="w-9/12 h-8 pt-1 bg-blue-400 text-white text-sm text-center items-center">Descrição</th>
            <th class="w-1/6 h-8 pt-1 bg-blue-400 text-white text-sm text-center items-center">Valor</th>
          </tr>
        </thead>
        <tbody class="inline-flex flex-col gap-3 w-screen mt-5">
        @foreach($budget->items as $item)
          <tr class="flex justify-between mb-6 w-11/12 ">
            <td class="titulo text-2xl text-blue-900 font-semibold">
                @if(isset($item['title']))
                    {{ $item['title'] }}
                @endif
              <p class="descricao text-sm text-black font-normal pt-1">{{ $item['description'] }}</p>

            </td>
            <td class="text-sm pt-9 pr-5">
                @if(isset($item['price']))
                    {{ $item['price'] }}
                @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>


    <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-5 mt-4">
      <div>
        <span class="text-xs">Condições de pagamento:</span>
        <p class="font-bold text-sm text-blue-800">50% de entrada +<br />50% na conclusão do projeto<br /> Teste 2</p>
      </div>

      <div>
        <span class="text-xs">Prazo de entrega:</span>
        <p class="font-bold text-sm text-blue-800">15 dias úteis</p>
      </div>

      <div>
        <span class="text-xs">Formas de pagamento:</span>
        <p class="font-bold text-sm text-blue-800">Dinheiro; <br/>Depósito Bancário; <br/> Boleto Bancário.</p>
      </div>

      <div>
        <span class="text-xs">Validade da proposta:</span>
        <p class="font-bold text-sm text-blue-800">15 dias</p>
      </div>
    </div>

    <div class="mt-12 w-11/12">
      <div class="w-full h-0.5 bg-blue-400"></div>
    </div>

    <div class="grid grid-flow-col grid-cols-1 grid-rows-1 gap-5 mt-4">
      <div>
        <p class="text-sm text-gray-800">Orçamento emitido pelo sistema</p>
        <img class="w-20 mt-1 ml-3" src="/assets/logo-1.webp" alt="Logo no rodapé">
      </div>

      <div class="absolute right-8 text-gray-600">
        <p class="font-bold"></p>
        <div class="flex flex-col text-right">
            <span class="text-sm">Rua endereço</span>
            <span class="text-sm">Boqueirão, Curitiba/PR - CEP 00.0000-000</span>
            <span class="text-sm">CNPJ 00.000.000/0000-00</span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
