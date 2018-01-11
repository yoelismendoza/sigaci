<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class tipomaterialrequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descripcion' => 'unique:tipo_empresa|required',
            'desde' => 'required',
            'hasta' => 'required',
            'id_estatus' => 'required'
        ];
    }
}
