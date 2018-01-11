<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class materialrequest extends Request
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
            'codigo' => 'unique:material|required',
            'descripcion' => 'unique:material|required',
            'serial' => 'required',
            'precio_compra' => 'numeric|required',
            'precio_venta' => 'numeric|required',
            'id_tipomaterial' => 'required',
            'cantidad_inicial' => 'required',
            'id_estatus' => 'required',
        ];
    }
}
