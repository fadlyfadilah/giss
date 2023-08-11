<?php

namespace App\Http\Requests;

use App\Models\Kampanye;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKampanyeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kampanye_edit');
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
            'image' => [
                'image|mimes:png,jpg,jpeg',
                'nullable',
            ],
            'lokasi' => [
                'string',
                'required',
            ],
        ];
    }
}