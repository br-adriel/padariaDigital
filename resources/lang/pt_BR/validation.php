<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Linhas de idioma para validação
    |--------------------------------------------------------------------------
    |
    | As seguintes linhas contém as mensagens de erro padrão utilizadas
    | pela classe validadora. Algumas dessas regras possuem múltiplas
    | versões, como as regras de tamanho. Sinta-se livre para ajustar
    | cada uma dessas mensagens.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => ':attribute não é uma URL válida.',
    'after' => ':attribute precisa ser uma data posterior a :date.',
    'after_or_equal' => ':attribute precisa ser uma data posterior ou igual a :date.',
    'alpha' => ':attribute pode conter apenas letras.',
    'alpha_dash' => ':attribute pode conter apenas letras, números, traços e underscores.',
    'alpha_num' => ':attribute pode conter apenas letras e números.',
    'array' => ':attribute precisa ser um array.',
    'before' => ':attribute precisa ser uma data anterior a :date.',
    'before_or_equal' => ':attribute precisa ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => ':attribute precisa estar entre :min e :max.',
        'file' => ':attribute precisa ter entre :min e :max kilobytes.',
        'string' => ':attribute precisa ter entre :min e :max caracteres.',
        'array' => ':attribute precisa ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute precisa ser verdadero ou falso.',
    'confirmed' => 'A confirmação de :attribute não corresponde.',
    'date' => ':attribute não é uma data válida.',
    'date_equals' => ':attribute precisa ser uma data igual a :date.',
    'date_format' => ':attribute não corresponde ao formato :format.',
    'different' => ':attribute e :other precisam ser diferentes.',
    'digits' => ':attribute precisa ter :digits dígitos.',
    'digits_between' => ':attribute precisa ter entre :min e :max dígitos.',
    'dimensions' => ':attribute possui diensões de imagem inválidas.',
    'distinct' => 'O campo :attribute possui um valor duplicado.',
    'email' => ':attribute precisa ser um endereço de email válido.',
    'ends_with' => ':attribute precisa terminar com um dos seguintes valores: :values.',
    'exists' => 'O atributo selecionado :attribute é inválido.',
    'file' => ':attribute precisa ser um arquivo.',
    'filled' => 'O campo :attribute precisa ter um valor.',
    'gt' => [
        'numeric' => ':attribute precisa ser maior que :value.',
        'file' => ':attribute precisa ser maior que :value kilobytes.',
        'string' => ':attribute precisa ser maior que :value caracteres.',
        'array' => ':attribute precisa ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => ':attribute precisa ser maior ou igual a :value.',
        'file' => ':attribute precisa ser maior ou igual a :value kilobytes.',
        'string' => ':attribute precisa ser maior ou igual a :value caracteres.',
        'array' => ':attribute precisa ter :value itens ou mais.',
    ],
    'image' => ':attribute precisa ser uma imagem.',
    'in' => 'O atributo selecionado :attribute é inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => ':attribute precisa ser um inteiro.',
    'ip' => ':attribute precisa ser um endereço IP válido.',
    'ipv4' => ':attribute precisa ser um endereço IPv4 válido.',
    'ipv6' => ':attribute precisa ser um endereço IPv6 válido.',
    'json' => ':attribute precisa ser uma string JSON válida.',
    'lt' => [
        'numeric' => ':attribute precisa ser menor que :value.',
        'file' => ':attribute precisa ser menor que :value kilobytes.',
        'string' => ':attribute precisa ser menor que :value caracteres.',
        'array' => ':attribute precisa ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => ':attribute precisa ser menor ou igual a :value.',
        'file' => ':attribute precisa ser menor ou igual a :value kilobytes.',
        'string' => ':attribute precisa ser menor ou igual a :value caracteres.',
        'array' => ':attribute não pode ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => ':attribute pode não ser maior que :max.',
        'file' => ':attribute pode não ser maior que :max kilobytes.',
        'string' => 'attribute pode não ser maior que :max caracteres.',
        'array' => ':attribute pode não ter mais que :max itens.',
    ],
    'mimes' => ':attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => ':attribute precisa ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => ':attribute precisa ser no mínimo :min.',
        'file' => ':attribute precisa ter no mínimo :min kilobytes.',
        'string' => ':attribute precisa ter no mínimo :min caracteres.',
        'array' => ':attribute precisa ter no mínimo :min itens.',
    ],
    'multiple_of' => ':attribute precisa ser múltiplo de :value.',
    'not_in' => 'O atributo selecionado :attribute é inválido.',
    'not_regex' => 'O formato de :attribute é inválido.',
    'numeric' => ':attribute precisa ser um número.',
    'password' => 'A senha está incorreta',
    'present' => 'O campo :attribute precisa estar presente.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'O campo :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute field é obrigatório quando :values estão presentes.',
    'required_without' => 'O campo :attribute fé obrigaório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos valores :values estão presentes.',
    'same' => ':attribute e :other devem corresponder.',
    'size' => [
        'numeric' => ':attribute precisa ser :size.',
        'file' => ':attribute precisa ter :size kilobytes.',
        'string' => ':attribute precisa ter :size caracteres.',
        'array' => ':attribute precisa conter :size itens.',
    ],
    'starts_with' => ':attribute precisa começar com um dos seguintes valores: :values.',
    'string' => ':attribute precisa ser uma string.',
    'timezone' => ':attribute precisa ser uma zona válida.',
    'unique' => ':attribute já foi utilizado.',
    'uploaded' => ':attribute falhou no envio.',
    'url' => 'O formato de :attribute é inválido.',
    'uuid' => ':attribute precisa ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Linhas de idioma para validação customizada
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar mensagens de validação customizadas
    | para atributos utilizando a convenção "atributo.regra" para nomear
    | as linhas. Isso torna mais rápido a especificação de uma linha
    | de idioma customizada específica para uma dada regra de atributo.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'mensagem-customizada',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atributos de validação customizada
    |--------------------------------------------------------------------------
    |
    | As seguintes linhas de idioma são usadas para trocar o placeholder
    | de nosso atributo por algo mais amigáel para o leitor, como "Endereço
    | de Email" ap invés de "email". Isso simplesmente nos ajuda a tornar
    | nossa mensagem mais expressiva.
    |
    */

    'attributes' => [],

];
