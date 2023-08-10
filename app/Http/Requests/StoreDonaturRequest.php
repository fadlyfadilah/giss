<?php

namespace App\Http\Requests;

use App\Models\Donatur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDonaturRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('donatur_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'nohp' => [
                'required',
            ],
            'jumlah' => [
                'required',
            ],
        ];
    }
}