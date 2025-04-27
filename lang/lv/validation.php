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

    'accepted' => 'Lauks :attribute ir jāpieņem.',
'accepted_if' => 'Lauks :attribute ir jāpieņem, ja :other ir :value.',
'active_url' => 'Laukam :attribute ir jābūt derīgam URL.',
'after' => 'Laukam :attribute ir jābūt datumam pēc :date.',
'after_or_equal' => 'Laukam :attribute ir jābūt datumam pēc vai vienādam ar :date.',
'alpha' => 'Laukam :attribute drīkst saturēt tikai burtus.',
'alpha_dash' => 'Laukam :attribute drīkst saturēt tikai burtus, ciparus, domu un pasvītrojumzīmes.',
'alpha_num' => 'Laukam :attribute drīkst saturēt tikai burtus un ciparus.',
'array' => 'Laukam :attribute ir jābūt masīvam.',
'ascii' => 'Laukam :attribute drīkst saturēt tikai vienbaitus alfanumeriskos rakstzīmes un simbolus.',
'before' => 'Laukam :attribute ir jābūt datumam pirms :date.',
'before_or_equal' => 'Laukam :attribute ir jābūt datumam pirms vai vienādam ar :date.',
'between' => [
    'array' => 'Laukam :attribute ir jāsatur no :min līdz :max elementiem.',
    'file' => 'Laukam :attribute ir jābūt no :min līdz :max kilobaitiem.',
    'numeric' => 'Laukam :attribute ir jābūt no :min līdz :max.',
    'string' => 'Laukam :attribute ir jābūt no :min līdz :max rakstzīmēm.',
],
'boolean' => 'Laukam :attribute ir jābūt patiesam vai aplamam.',
'can' => 'Laukā :attribute ir neautorizēta vērtība.',
'confirmed' => ':attribute apstiprinājums nesakrīt.',
'contains' => 'Laukam :attribute trūkst nepieciešamas vērtības.',
'current_password' => 'Parole ir nepareiza.',
'date' => 'Laukam :attribute ir jābūt derīgam datumam.',
'date_equals' => 'Laukam :attribute ir jābūt datumam, kas vienāds ar :date.',
'date_format' => 'Laukam :attribute ir jāatbilst formātam :format.',
'decimal' => 'Laukam :attribute ir jābūt ar :decimal decimāldaļām.',
'declined' => 'Laukam :attribute ir jānoraida.',
'declined_if' => 'Laukam :attribute ir jānoraida, kad :other ir :value.',
'different' => 'Laukam :attribute un :other ir jābūt atšķirīgiem.',
'digits' => 'Laukam :attribute ir jābūt :digits cipariem.',
'digits_between' => 'Laukam :attribute ir jābūt no :min līdz :max cipariem.',
'dimensions' => 'Laukam :attribute ir nederīgas attēla dimensijas.',
'distinct' => 'Laukam :attribute ir dubulta vērtība.',
'doesnt_end_with' => 'Laukam :attribute nedrīkst beigties ar vienu no šiem: :values.',
'doesnt_start_with' => 'Laukam :attribute nedrīkst sākties ar vienu no šiem: :values.',
'email' => 'Laukam :attribute ir jābūt derīgai e-pasta adresei.',
'ends_with' => 'Laukam :attribute ir jābeidzas ar vienu no šiem: :values.',
'enum' => 'Izvēlētais :attribute ir nederīgs.',
'exists' => 'Izvēlētais :attribute ir nederīgs.',
'extensions' => 'Laukam :attribute ir jābūt ar vienu no šādām paplašinājumiem: :values.',
'file' => 'Laukam :attribute ir jābūt failam.',
'filled' => 'Laukam :attribute ir jābūt ar vērtību.',
'gt' => [
    'array' => 'Laukam :attribute ir jābūt vairāk nekā :value elementiem.',
    'file' => 'Laukam :attribute ir jābūt lielākam par :value kilobaitiem.',
    'numeric' => 'Laukam :attribute ir jābūt lielākam par :value.',
    'string' => 'Laukam :attribute ir jābūt garākam par :value rakstzīmēm.',
],
'gte' => [
    'array' => 'Laukam :attribute ir jābūt vismaz :value elementiem.',
    'file' => 'Laukam :attribute ir jābūt lielākam vai vienādam ar :value kilobaitiem.',
    'numeric' => 'Laukam :attribute ir jābūt lielākam vai vienādam ar :value.',
    'string' => 'Laukam :attribute ir jābūt garākam vai vienādam ar :value rakstzīmēm.',
],
'hex_color' => 'Laukam :attribute ir jābūt derīgai heksadecimālai krāsai.',
'image' => 'Laukam :attribute ir jābūt attēlam.',
'in' => 'Izvēlētais :attribute ir nederīgs.',
'in_array' => 'Laukam :attribute ir jāeksistē laukā :other.',
'integer' => ':attribute jābūt veselam skaitlim.',
'ip' => 'Laukam :attribute ir jābūt derīgai IP adresi.',
'ipv4' => 'Laukam :attribute ir jābūt derīgai IPv4 adresi.',
'ipv6' => 'Laukam :attribute ir jābūt derīgai IPv6 adresi.',
'json' => 'Laukam :attribute ir jābūt derīgai JSON virknei.',
'list' => 'Laukam :attribute ir jābūt sarakstam.',
'lowercase' => 'Laukam :attribute ir jābūt mazajiem burtiem.',
'lt' => [
    'array' => 'Laukam :attribute ir jābūt mazāk nekā :value elementiem.',
    'file' => 'Laukam :attribute ir jābūt mazākam par :value kilobaitiem.',
    'numeric' => 'Laukam :attribute ir jābūt mazākam par :value.',
    'string' => 'Laukam :attribute ir jābūt īsākam par :value rakstzīmēm.',
],
'lte' => [
    'array' => 'Laukam :attribute nedrīkst būt vairāk par :value elementiem.',
    'file' => 'Laukam :attribute ir jābūt mazākam vai vienādam ar :value kilobaitiem.',
    'numeric' => 'Laukam :attribute ir jābūt mazākam vai vienādam ar :value.',
    'string' => 'Laukam :attribute ir jābūt īsākam vai vienādam ar :value rakstzīmēm.',
],
'mac_address' => 'Laukam :attribute ir jābūt derīgai MAC adresi.',
'max' => [
    'array' => 'Laukam :attribute nedrīkst būt vairāk par :max elementiem.',
    'file' => 'Laukam :attribute nedrīkst būt lielāks par :max kilobaitiem.',
    'numeric' => ':attribute nevar būt nākotnē.',
    'string' => ':attribute nedrīkst būt garāks par :max rakstzīmēm.',
],
'max_digits' => 'Laukam :attribute nedrīkst būt vairāk par :max cipariem.',
'mimes' => 'Laukam :attribute ir jābūt faila tipam: :values.',
'mimetypes' => 'Laukam :attribute ir jābūt faila tipam: :values.',
'min' => [
    'array' => 'Laukam :attribute ir jābūt vismaz :min elementiem.',
    'file' => 'Laukam :attribute ir jābūt vismaz :min kilobaitiem.',
    'numeric' => ':attribute nedrīkst būt vecāks par :min.',
    'string' => 'Laukam :attribute ir jābūt vismaz :min rakstzīmēm.',
],
'min_digits' => 'Laukam :attribute ir jābūt vismaz :min cipariem.',
'missing' => 'Laukam :attribute ir jābūt trūkstošam.',
'missing_if' => 'Laukam :attribute ir jābūt trūkstošam, kad :other ir :value.',
'missing_unless' => 'Laukam :attribute ir jābūt trūkstošam, ja vien :other nav :value.',
'missing_with' => 'Laukam :attribute ir jābūt trūkstošam, kad :values ir klāt.',
'missing_with_all' => 'Laukam :attribute ir jābūt trūkstošam, kad :values ir klāt.',
'multiple_of' => 'Laukam :attribute ir jābūt :value reizinājumam.',
'not_in' => 'Izvēlētais :attribute ir nederīgs.',
'not_regex' => 'Lauka :attribute formāts ir nederīgs.',
'numeric' => 'Laukam :attribute ir jābūt skaitlim.',
'password' => [
    'letters' => 'Laukam :attribute ir jāsatur vismaz viens burts.',
    'mixed' => 'Laukam :attribute ir jāsatur vismaz viens lielais un viens mazais burts.',
    'numbers' => 'Laukam :attribute ir jāsatur vismaz viens cipars.',
    'symbols' => 'Laukam :attribute ir jāsatur vismaz viens simbols.',
    'uncompromised' => 'Dotais :attribute ir parādījies datu noplūdē. Lūdzu, izvēlieties citu :attribute.',
],
'present' => 'Laukam :attribute ir jābūt klāt.',
'present_if' => 'Laukam :attribute ir jābūt klāt, kad :other ir :value.',
'present_unless' => 'Laukam :attribute ir jābūt klāt, ja vien :other nav :value.',
'present_with' => 'Laukam :attribute ir jābūt klāt, kad :values ir klāt.',
'present_with_all' => 'Laukam :attribute ir jābūt klāt, kad :values ir klāt.',
'prohibited' => 'Laukam :attribute ir aizliegts.',
'prohibited_if' => 'Laukam :attribute ir aizliegts, kad :other ir :value.',
'prohibited_if_accepted' => 'Laukam :attribute ir aizliegts, kad :other ir pieņemts.',
'prohibited_if_declined' => 'Laukam :attribute ir aizliegts, kad :other ir noraidīts.',
'prohibited_unless' => 'Laukam :attribute ir aizliegts, ja vien :other nav :values.',
'prohibits' => 'Lauks :attribute aizliedz :other klātbūtni.',
'regex' => 'Lauka :attribute formāts ir nederīgs.',
'required' => ':attribute ir obligāts.',
'required_array_keys' => 'Laukam :attribute ir jāsatur ieraksti šiem: :values.',
'required_if' => 'Lauks :attribute ir obligāts, kad :other ir :value.',
'required_if_accepted' => 'Lauks :attribute ir obligāts, kad :other ir pieņemts.',
'required_if_declined' => 'Lauks :attribute ir obligāts, kad :other ir noraidīts.',
'required_unless' => 'Lauks :attribute ir obligāts, ja vien :other nav :values.',
'required_with' => 'Lauks :attribute ir obligāts, kad :values ir klāt.',
'required_with_all' => 'Lauks :attribute ir obligāts, kad :values ir klāt.',
'required_without' => 'Lauks :attribute ir obligāts, kad :values nav klāt.',
'required_without_all' => 'Lauks :attribute ir obligāts, kad neviens no :values nav klāt.',
'same' => 'Laukam :attribute ir jāsakrīt ar :other.',
'size' => [
    'array' => 'Laukam :attribute ir jāsatur :size elementi.',
    'file' => 'Laukam :attribute ir jābūt :size kilobaitiem.',
    'numeric' => 'Laukam :attribute ir jābūt :size.',
    'string' => 'Laukam :attribute ir jābūt :size rakstzīmēm.',
],
'starts_with' => 'Laukam :attribute ir jāsākas ar vienu no šiem: :values.',
'string' => 'Laukam :attribute ir jābūt virknei.',
'timezone' => 'Laukam :attribute ir jābūt derīgai laika zonai.',
'unique' => 'Lauks :attribute jau ir aizņemts.',
'uploaded' => 'Lauka :attribute augšupielāde neizdevās.',
'uppercase' => 'Laukam :attribute ir jābūt lielajiem burtiem.',
'url' => 'Laukam :attribute ir jābūt derīgam URL.',
'ulid' => 'Laukam :attribute ir jābūt derīgam ULID.',
'uuid' => 'Laukam :attribute ir jābūt derīgam UUID.',
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
        'rule-name' => 'pielāgota ziņojuma teksts',
    ],
],
/*
|--------------------------------------------------------------------------
| Custom Validation Attributes
|--------------------------------------------------------------------------
|
| The following language lines are used to swap our attribute placeholder
| with something more reader friendly such as "E-Mail Address" instead
| of "email". This simply helps us make our message more expressive.
|
*/
'attributes' => [
    'fileName' => 'Faila nosaukums',
    'password' => 'Paroles lauks',
    'fileDescription' => 'Apraksts',
    'author' => 'Autora lauks',
    'Autors' => 'Autora lauks',
    'Apraksts' => 'Apraksts',
    'Nosaukums' => 'Faila nosaukums',
    'Iemesls' => 'Iemesls',
    'current_password' => 'pašreizējā parole',
    'Kat_Nosaukums' => 'Kategorijas nosaukums',
    'G_Nosaukums' => 'Žanra nosaukums',
    'name' => 'Vārds',
    'email' => 'E-pasts',
    'Izlaists' => 'Gads',
    'Bitrate' => 'Bitu pārraides ātrums',
],
];