<?php

namespace App\Http\Requests;

use App\Models\Donatur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDonaturRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('donatur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:donaturs,id',
        ];
    }
}