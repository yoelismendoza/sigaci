<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class cotizacionrequest extends Request
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
            'id_cliente' => 'required',
            'id_empresa' => 'required',
            'id_tipocotizacion' => 'required',
            'validez' => 'numeric|required',
            'detalle' => 'string|max:200',
            'id_estatus' => 'required',
            
        ];
    }

}
