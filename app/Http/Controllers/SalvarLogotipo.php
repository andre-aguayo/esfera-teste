<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;

class SalvarLogotipo extends Controller
{
    public function salvarLogotipo(EmpresaRequest $request)
    {

        if ($request->hasFile('logotipo')) {

            $filenameWithExt = $request->file('logotipo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logotipo')->getClientOriginalExtension();
            $nomeLogotipo = $filename . '_' . time() . '.' . $extension;
            $request->file('logotipo')->storeAs('public/logotipo', $nomeLogotipo);
        } else {
            $nomeLogotipo = '';
        }
        return  $nomeLogotipo;
    }
}
