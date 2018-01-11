<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class clienterequest extends Request
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
            'rif' => 'string|max:30|unique:cliente|required',
            'codigo' => 'string|max:10|unique:cliente|required',
            'nombre' => 'string|max:200|unique:cliente|required',
            'direccion' => 'string|max:200|required',
            'email' => 'required|email|unique:cliente',
            'telefono' => 'string|max:30|required',
            'id_estatus' => 'required',
        ];
    }
}
