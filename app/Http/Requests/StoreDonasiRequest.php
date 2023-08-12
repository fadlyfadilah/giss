<?php

namespace App\Http\Requests;

use App\Models\Donasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDonasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('donasi_create');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'jumlah' => [
                'required',
            ],
        ];
    }
}