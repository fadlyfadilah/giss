<?php

return [
    'accepted'         => 'Isian :attribute harus diterima.',
    'active_url'       => 'Isian :attribute bukan URL yang valid.',
    'after'            => 'Isian :attribute harus tanggal setelah :date.',
    'after_or_equal'   => 'Isian :attribute harus tanggal sesudah atau sama dengan :date',
    'alpha'            => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash'       => 'Isian :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'        => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'latin'            => ':attribute hanya boleh berisi huruf alfabet ISO basic Latin.',
    'latin_dash_space' => ':attribute hanya boleh berisi huruf alfabet, nomor,  tanda garis, tanda sambung dan spasi Latin ISO.',
    'array'            => 'Isian :attribute harus berupa sebuah array.',
    'before'           => ':attribute harus tanggal sebelum :date.',
    'before_or_equal'  => 'Isian :attribute harus tanggal sebelum atau sama dengan :date',
    'between'          => [
        'numeric' => ':attribute harus diantara :min dan :max.',
        'file'    => ':attribute harus diantara :min dan :max kilobytes.',
        'string'  => ':attribute harus diantara :min dan :max characters.',
        'array'   => ':attribute harus diantara :min dan :max buah.',
    ],
    'boolean'          => ':attribute field harus bernilai \"true\" atau \"false\".',
    'confirmed'        => 'konfirmasi :attribute tidak cocok.',
    'current_password' => 'Sandi salah.',
    'date'             => ':attribuet bukan tanggal yang valid',
    'date_equals'      => ':attribute harus sesuai dengan :date.',
    'date_format'      => ':attribute tidak cocok dengan format standar :format',
    'different'        => ':attribute dan :other harus berbeda.',
    'digits'           => ':attribute harus memiliki :digits  digit',
    'digits_between'   => ':attribute harus memiliki panjang minimal :min dan maksimal :max',
    'dimensions'       => 'Dimensi :attribute tidak sesuai.',
    'distinct'         => ':attribute sudah digunakan.',
    'email'            => 'Format :attribute  tidak sesuai.',
    'ends_with'        => ':attribute harus di akhiri dengan salah satu dari: :values.',
    'exists'           => 'Pilihan :attribute tidak sesuai.',
    'file'             => ':attribute harus berupa file.',
    'filled'           => 'isian :attribute tidak boleh kosong.',
    'gt'               => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file'    => ':attribute harus lebih besar dari :value kilobytes.',
        'string'  => ':attribute harus lebih banyak dari :value karakter.',
        'array'   => ':attribute harus lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file'    => ':attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string'  => 'Jumlah :attribute harus lebih atau sama dengan :value karakter.',
        'array'   => ':attribute harus memliki :value item atau lebih.',
    ],
    'image'    => 'Isian  :attribute harus berupa gambar',
    'in'       => 'isian :attribute salah.',
    'in_array' => ':attribute tidak boleh ada pada :other.',
    'integer'  => ':attribute harus berupa angka.',
    'ip'       => ':attribute harus memiliki alamat IP yang benar.',
    'ipv4'     => ':attribute harus memiliki alamat IPv4 yang benar.',
    'ipv6'     => ':attribute harus memiliki alamat IPv6 yang benar.',
    'json'     => ':attribute harus memiliki format JSON yang benar.',
    'lt'       => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file'    => ':attribute harus kurang dari :value kilobytes.',
        'string'  => ':attribute harus kurang dari :value karakter',
        'array'   => ':attribute harus kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang atau sama dengan :value.',
        'file'    => ':attribute harus kurang atau sama dengan :value kilobyte.',
        'string'  => ':attribute harus kurang atau sama dengan :value karakter.',
        'array'   => ':attribute tidak boleh lebih dari :value item.',
    ],
    'max' => [
        'numeric' => 'Isian :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Bidang :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Isian :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Isian :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'     => ':attribute harus file dengan tipe: :values.',
    'mimetypes' => 'tipe file :attribute harus :values.',
    'min'       => [
        'numeric' => 'jumlah minimal  :attribute harus  :min.',
        'file'    => ':attribute harus memiliki ukuran minimal :min kilobytes',
        'string'  => ':attribute harus memiliki panjang minimal :min karakter',
        'array'   => ':attribute harus memiliki minimal :min item',
    ],
    'not_in'               => ':attribute yang dipilih tidak sesuai',
    'not_regex'            => 'format :attribute tidak sesuai',
    'numeric'              => ':attribute harus berupa angka',
    'password'             => 'Sandi salah.',
    'present'              => 'Bidang isian :attribute wajib ada.',
    'regex'                => 'format :attribut tidak cocok',
    'required'             => ':attribute diperlukan',
    'required_if'          => ':attribute diperlukan ketika  :other adalah :value.',
    'required_unless'      => 'Bidang isian :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Bidang isian :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Bidang isian :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Bidang isian :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Bidang isian :attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => 'Isian :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Isian :attribute harus berukuran :size.',
        'file'    => 'Bidang :attribute harus berukuran :size kilobyte.',
        'string'  => 'Isian :attribute harus berukuran :size karakter.',
        'array'   => 'Isian :attribute harus mengandung :size item.',
    ],
    'starts_with' => ':attribute harus diawali salah satu dari: :values.',
    'string'      => ':attribute harus berupa text.',
    'timezone'    => 'Isian :attribute harus berupa zona waktu yang valid.',
    'unique'      => 'Isian :attribute sudah ada sebelumnya.',
    'uploaded'    => ':attribute gagal diunggah',
    'url'         => 'format :attribut tidak valid',
    'uuid'        => ':attribute harus UUID yang valid.',
    'custom'      => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => ':attribute mengandung kata yang sudah ada',
    'dont_allow_first_letter_number' => 'Kolom \":input\" tidak boleh diawali dengan nomor.',
    'exceeds_maximum_number'         => ':attribute melebihi batas maksimal model.',
    'db_column'                      => ':attribute hanya boleh berisi huruf alfabet, nomor,  tanda garis Latin ISO dan tidak dimulai dengan nomor',
    'attributes'                     => [],

];