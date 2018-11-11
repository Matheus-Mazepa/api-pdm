<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['street', 'district', 'city', 'state']);

    }


    public function getStates()
    {
        return [
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MT',
            'MS',
            'MG',
            'PA',
            'PB',
            'PR',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO',
        ];
    }
}
