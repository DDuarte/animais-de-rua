<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O campo :attribute dever� ser aceite.',
    'active_url' => 'O campo :attribute n�o cont�m um URL v�lido.',
    'after' => 'O campo :attribute dever� conter uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute dever� conter uma data posterior ou igual a :date.',
    'alpha' => 'O campo :attribute dever� conter apenas letras.',
    'alpha_dash' => 'O campo :attribute dever� conter apenas letras, n�meros e tra�os.',
    'alpha_num' => 'O campo :attribute dever� conter apenas letras e n�meros.',
    'array' => 'O campo :attribute dever� conter uma cole��o de elementos.',
    'before' => 'O campo :attribute dever� conter uma data anterior a :date.',
    'before_or_equal' => 'O Campo :attribute dever� conter uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => 'O campo :attribute dever� ter um valor entre :min - :max.',
        'file' => 'O campo :attribute dever� ter um tamanho entre :min - :max kilobytes.',
        'string' => 'O campo :attribute dever� conter entre :min - :max caracteres.',
        'array' => 'O campo :attribute dever� conter entre :min - :max elementos.',
    ],
    'boolean' => 'O campo :attribute dever� conter o valor verdadeiro ou falso.',
    'confirmed' => 'A confirma��o para o campo :attribute n�o coincide.',
    'date' => 'O campo :attribute n�o cont�m uma data v�lida.',
    'date_format' => 'A data indicada para o campo :attribute n�o respeita o formato :format.',
    'different' => 'Os campos :attribute e :other dever�o conter valores diferentes.',
    'digits' => 'O campo :attribute dever� conter :digits caracteres.',
    'digits_between' => 'O campo :attribute dever� conter entre :min a :max caracteres.',
    'dimensions' => 'O campo :attribute dever� conter uma dimens�o de imagem v�lida.',
    'distinct' => 'O campo :attribute cont�m um valor duplicado.',
    'email' => 'O campo :attribute n�o cont�m um endere�o de correio eletr�nico v�lido.',
    'exists' => 'O valor selecionado para o campo :attribute � inv�lido.',
    'file' => 'O campo :attribute dever� conter um ficheiro.',
    'filled' => '� obrigat�ria a indica��o de um valor para o campo :attribute.',
    'gt' => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file' => 'O campo :attribute deve ser maior que :value kilobytes.',
        'string' => 'O campo :attribute deve ter :value caracteres ou mais.',
        'array' => 'O campo :attribute deve ser conter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file' => 'O campo :attribute deve ser maior ou igual :value kilobytes.',
        'string' => 'O campo :attribute deve ter maior ou igual a :value caracteres.',
        'array' => 'O campo :attribute deve ter :value ou mais itens.',
    ],
    'image' => 'O campo :attribute dever� conter uma imagem.',
    'in' => 'O campo :attribute n�o cont�m um valor v�lido.',
    'in_array' => 'O campo :attribute n�o existe em :other.',
    'integer' => 'O campo :attribute dever� conter um n�mero inteiro.',
    'ip' => 'O campo :attribute dever� conter um IP v�lido.',
    'ipv4' => 'O campo :attribute dever� conter um IPv4 v�lido.',
    'ipv6' => 'O campo :attribute dever� conter um IPv6 v�lido.',
    'json' => 'O campo :attribute dever� conter um texto JSON v�lido.',
    'lt' => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file' => 'O campo :attribute deve ser menor que :value kilobytes.',
        'string' => 'O campo :attribute deve ter menos do que :value caracteres.',
        'array' => 'O campo :attribute deve ter menos do que :value itens.',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file' => 'O campo :attribute deve ser menor ou igual a :value kilobytes.',
        'string' => 'O campo :attribute deve ter :value caracteres ou menos.',
        'array' => 'O campo :attribute deve ter :value itens ou menos.',
    ],
    'max' => [
        'numeric' => 'O campo :attribute n�o dever� conter um valor superior a :max.',
        'file' => 'O campo :attribute n�o dever� ter um tamanho superior a :max kilobytes.',
        'string' => 'O campo :attribute n�o dever� conter mais de :max caracteres.',
        'array' => 'O campo :attribute n�o dever� conter mais de :max elementos.',
    ],
    'mimes' => 'O campo :attribute dever� conter um ficheiro do tipo: :values.',
    'mimetypes' => 'O campo :attribute dever� conter um ficheiro do tipo: :values.',
    'min' => [
        'numeric' => 'O campo :attribute dever� ter um valor superior ou igual a :min.',
        'file' => 'O campo :attribute dever� ter no m�nimo :min kilobytes.',
        'string' => 'O campo :attribute dever� conter no m�nimo :min caracteres.',
        'array' => 'O campo :attribute dever� conter no m�nimo :min elementos.',
    ],
    'not_in' => 'O campo :attribute cont�m um valor inv�lido.',
    'numeric' => 'O campo :attribute dever� conter um valor num�rico.',
    'not_regex' => 'O formato do valor para o campo :attribute � inv�lido.',
    'present' => 'O campo :attribute dever� estar presente.',
    'regex' => 'O formato do valor para o campo :attribute � inv�lido.',
    'required' => '� obrigat�ria a indica��o de um valor para o campo :attribute.',
    'required_if' => '� obrigat�ria a indica��o de um valor para o campo :attribute quando o valor do campo :other � igual a :value.',
    'required_unless' => '� obrigat�ria a indica��o de um valor para o campo :attribute a menos que :other esteja presente em :values.',
    'required_with' => '� obrigat�ria a indica��o de um valor para o campo :attribute quando :values est� presente.',
    'required_with_all' => '� obrigat�ria a indica��o de um valor para o campo :attribute quando um dos :values est� presente.',
    'required_without' => '� obrigat�ria a indica��o de um valor para o campo :attribute quando :values n�o est� presente.',
    'required_without_all' => '� obrigat�ria a indica��o de um valor para o campo :attribute quando nenhum dos :values est� presente.',
    'same' => 'Os campos :attribute e :other dever�o conter valores iguais.',
    'size' => [
        'numeric' => 'O campo :attribute dever� conter o tamanho de :size.',
        'file' => 'O campo :attribute dever� ter o tamanho de :size kilobytes.',
        'string' => 'O campo :attribute dever� conter :size caracteres.',
        'array' => 'O campo :attribute dever� conter :size elementos.',
    ],
    'string' => 'O campo :attribute dever� conter texto.',
    'timezone' => 'O campo :attribute dever� ter um fuso hor�rio v�lido.',
    'unique' => 'O valor indicado para o campo :attribute j� se encontra registado.',
    'uploaded' => 'O upload do ficheiro :attribute falhou.',
    'url' => 'O formato do URL indicado para o campo :attribute � inv�lido.',

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
        'address' => 'endere�o',
        'adoption_id' => 'adop��o',
        'affected_animals' => 'animais intervencionados',
        'age' => 'idade',
        'alias' => 'alias',
        'amount' => 'quantidade',
        'amount_females' => 'f�meas',
        'amount_males' => 'machos',
        'amount_other' => 'outros',
        'benefit' => 'benef�cio',
        'contact' => 'contacto',
        'council' => 'concelho',
        'date_1' => 'data',
        'date_2' => 'data',
        'description' => 'descri��o',
        'donation_id' => 'donativo',
        'email' => 'email',
        'expense' => 'despesa',
        'fat_id' => 'fat',
        'file' => 'ficheiro',
        'gender' => 'g�nero',
        'godfather_id' => 'padrinho',
        'headquarter_id' => 'n�cleo',
        'history' => 'hist�ria',
        'image' => 'imagem',
        'introduction' => 'introdu��o',
        'latlong' => 'localiza��o',
        'name' => 'nome',
        'notes' => 'notas',
        'paypal_code' => 'c�digo paypal',
        'phone' => 'telefone',
        'process_id' => 'processo',
        'specie' => 'especie',
        'status' => 'estado',
        'sterilized' => 'esterilizado',
        'territory_id' => 'territ�rio',
        'treatment_id' => 'tratamento',
        'treatment_type_id' => 'tipo de tratamento',
        'type' => 'tipo',
        'url' => 'url',
        'vaccinated' => 'vacinado',
        'value' => 'valor',
        'vet_id' => 'veterin�rio',
        'vet_id_1' => 'veterin�rio',
        'vet_id_2' => 'veterin�rio',
    ],

];
