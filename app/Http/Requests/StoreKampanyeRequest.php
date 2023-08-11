<?php

namespace App\Http\Requests;

use App\Models\Kampanye;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKampanyeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kampanye_create');
    }

    public function rules()
    {
        return [
            'nama_kampanye' => [
                'string',
                'required',
            ],
            'total' => [
                'required',
            ],
            'lokasi' => [
                'string',
                'required',
            ],
        ];
    }
}