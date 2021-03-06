<?php

namespace sigaci\Http\Requests;

use sigaci\Http\Requests\Request;

class inventariorequest extends Request
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
            'desde' => 'required',
            'id_ejercicio' => 'required',
           
            'id_estatus' => 'required',
            'hasta' => 'required',
            
        ];
    }
}
