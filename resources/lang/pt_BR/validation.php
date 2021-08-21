<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted' => 'O campo deve ser aceito.',
    'active_url' => 'O campo deve conter uma URL válida.',
    'after' => 'O campo deve conter uma data posterior a :date.',
    'after_or_equal' => 'O campo deve conter uma data superior ou igual a :date.',
    'alpha' => 'O campo deve conter apenas letras.',
    'alpha_dash' => 'O campo deve conter apenas letras, números e traços.',
    'alpha_num' => 'O campo deve conter apenas letras e números .',
    'array' => 'O campo deve conter um array.',
    'before' => 'O campo deve conter uma data anterior a :date.',
    'before_or_equal' => 'O campo deve conter uma data inferior ou igual a :date.',
    'between' => [
        'numeric' => 'O campo deve conter um número entre :min e :max.',
        'file' => 'O campo deve conter um arquivo de :min a :max kilobytes.',
        'string' => 'O campo deve conter entre :min a :max caracteres.',
        'array' => 'O campo deve conter de :min a :max itens.',
    ],
    'boolean' => 'O campo deve conter o valor verdadeiro ou falso.',
    'confirmed' => 'A confirmação para o campo não coincide.',
    'date' => 'O campo não contém uma data válida.',
    'date_equals' => 'O campo deve ser uma data igual a :date.',
    'date_format' => 'A data informada para o campo não respeita o formato :format.',
    'different' => 'Os campos e :other devem conter valores diferentes.',
    'digits' => 'O campo deve conter :digits dígitos.',
    'digits_between' => 'O campo deve conter entre :min a :max dígitos.',
    'dimensions' => 'O valor informado para o campo não é uma dimensão de imagem válida.',
    'distinct' => 'O campo contém um valor duplicado.',
    'email' => 'O campo não contém um endereço de email válido.',
    'ends_with' => 'O campo deve terminar com um dos seguintes valores: :values',
    'exists' => 'O valor selecionado para o campo é inválido.',
    'file' => 'O campo deve conter um arquivo.',
    'filled' => 'O campo é obrigatório.',
    'gt' => [
        'numeric' => 'O campo deve ser maior que :value.',
        'file' => 'O arquivo deve ser maior que :value kilobytes.',
        'string' => 'O campo deve ser maior que :value caracteres.',
        'array' => 'O campo deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo deve ser maior ou igual a :value.',
        'file' => 'O arquivo deve ser maior ou igual a :value kilobytes.',
        'string' => 'O campo deve ser maior ou igual a :value caracteres.',
        'array' => 'O campo deve ter :value itens ou mais.',
    ],
    'image' => 'O campo deve conter uma imagem.',
    'in' => 'O campo não contém um valor válido.',
    'in_array' => 'O campo não existe em :other.',
    'integer' => 'O campo deve conter um número inteiro.',
    'ip' => 'O campo deve conter um IP válido.',
    'ipv4' => 'O campo deve conter um IPv4 válido.',
    'ipv6' => 'O campo deve conter um IPv6 válido.',
    'json' => 'O campo deve conter uma string JSON válida.',
    'lt' => [
        'numeric' => 'O campo deve ser menor que :value.',
        'file' => 'O arquivo ser menor que :value kilobytes.',
        'string' => 'O campo deve ser menor que :value caracteres.',
        'array' => 'O campo deve ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => 'O campo deve ser menor ou igual a :value.',
        'file' => 'O arquivo ser menor ou igual a :value kilobytes.',
        'string' => 'O campo deve ser menor ou igual a :value caracteres.',
        'array' => 'O campo não deve ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O campo não pode conter um valor superior a :max.',
        'file' => 'O campo não pode conter um arquivo com mais de :max kilobytes.',
        'string' => 'O campo não pode conter mais de :max caracteres.',
        'array' => 'O campo deve conter no máximo :max itens.',
    ],
    'mimes' => 'O campo deve conter um arquivo do tipo: :values.',
    'mimetypes' => 'O campo deve conter um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O campo deve conter um número superior ou igual a :min.',
        'file' => 'O campo deve conter um arquivo com no mínimo :min kilobytes.',
        'string' => 'O campo deve conter no mínimo :min caracteres.',
        'array' => 'O campo deve conter no mínimo :min itens.',
    ],
    'not_in' => 'O campo contém um valor inválido.',
    'not_regex' => 'O formato do valor é inválido.',
    'numeric' => 'O campo deve conter um valor numérico.',
    'password' => 'A senha está incorreta.',
    'present' => 'O campo deve estar presente.',
    'regex' => 'O formato do valor informado no campo é inválido.',
    'required' => 'O campo é obrigatório.',
    'required_if' => 'O campo é obrigatório quando o valor do campo :other é igual a :value.',
    'required_unless' => 'O campo é obrigatório a menos que :other esteja presente em :values.',
    'required_with' => 'O campo é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo é obrigatório quando um dos :values está presente.',
    'required_without' => 'O campo é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo é obrigatório quando nenhum dos :values está presente.',
    'same' => 'Os campos e :other devem conter valores iguais.',
    'size' => [
        'numeric' => 'O campo deve conter o número :size.',
        'file' => 'O campo deve conter um arquivo com o tamanho de :size kilobytes.',
        'string' => 'O campo deve conter :size caracteres.',
        'array' => 'O campo deve conter :size itens.',
    ],
    'starts_with' => 'O campo deve começar com um dos seguintes valores: :values',
    'string' => 'O campo deve ser uma string.',
    'timezone' => 'O campo deve conter um fuso horário válido.',
    'unique' => 'O valor informado para o campo já está em uso.',
    'uploaded' => 'Falha no Upload do arquivo.',
    'url' => 'O formato da URL informada para o campo é inválido.',
    'uuid' => 'O campo deve ser um UUID válido.',
    'cpf' => 'O campo deve ser um CPF válido',
    'cnpj' => 'O campo deve ser um CNPJ válido',
    'cnpj_cpf' => 'O campo deve ser um CNPJ/CPF',
    'phone' => 'O campo deve ser um número de telefone',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'address' => 'endereço',
        'zip' => 'cep',
        'age' => 'idade',
        'body' => 'conteúdo',
        'city' => 'cidade',
        'country' => 'país',
        'date' => 'data',
        'day' => 'dia',
        'description' => 'descrição',
        'excerpt' => 'resumo',
        'first_name' => 'primeiro nome',
        'gender' => 'gênero',
        'hour' => 'hora',
        'last_name' => 'sobrenome',
        'message' => 'mensagem',
        'minute' => 'minuto',
        'mobile' => 'celular',
        'month' => 'mês',
        'name' => 'nome',
        'password_confirmation' => 'confirmação da senha',
        'password' => 'senha',
        'phone' => 'telefone',
        'second' => 'segundo',
        'sex' => 'sexo',
        'state' => 'estado',
        'subject' => 'assunto',
        'text' => 'texto',
        'time' => 'hora',
        'title' => 'título',
        'username' => 'usuário',
        'year' => 'ano',
        'email' => 'e-mail',
        'remember' => 'lembrar-me',
        'country_register' => 'CPF/CNPJ',
        'birthdate' => 'data de nascimento',
        'state_register' => 'RG/Inscrição estadual',
        'address' => [
            'zip' => 'CEP',
            'district' => 'bairro',
            'city' => 'cidade',
            'state' => 'estado',
            'street' => 'logradouro',
            'number' => 'número',
            'complement' => 'complemento',
        ],
        'phones.*.phone' => 'telefone',
    ],
];
