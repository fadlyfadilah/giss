<?php

namespace App\Http\Requests;

use App\Models\Koordinat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKoordinatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('koordinat_create');
    }

    public function rules()
    {
        return [
            'location' => [
                'string',
                'required',
            ],
        ];
    }
}