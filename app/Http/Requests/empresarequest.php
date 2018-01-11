<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class empresarequest extends Request
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
            'descripcion' => 'unique:empresa|required',
            'direccion' => 'required',
            'rif' => 'required',
            'nit' => 'required',
            'representante' => 'required',
            'ci_representante' => 'required',
            'id_tipoempresa' => 'required',
            'desde' => 'required',
            'hasta' => 'required'
        ];
    }
}
