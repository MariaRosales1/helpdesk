<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function edit()
    {
        $company = Company::all()->first();

        return view('company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);

        if (! $company) {
            return back()->withInput()->withErrors(['message' => 'No se pudo encontrar la compañía a editar']);
        }

        $company->update($request->validated());

        return back()->withInput()->with('message', 'Compañía editada exitosamente');
    }
}
