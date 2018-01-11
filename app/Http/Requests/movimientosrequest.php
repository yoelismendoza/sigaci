<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class movimientosrequest extends Request
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
            'id_inventario' => 'required',
            'id_material' => 'required',
            'cantidad' => 'required',
            'precio' => 'numeric|required',
            'id_movimiento' => 'required',
            'detalle' => 'required',
            'fecha' => 'required',
        ];
    }
}
