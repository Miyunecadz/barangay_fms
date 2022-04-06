<?php

namespace App\Http\Controllers;

use App\Models\Cedula;
use Illuminate\Http\Request;

class CedulaController extends Controller
{
    public function index()
    {
        return view('transaction.cedula.index');
    }

    public function create()
    {
        $sex = ['Male', 'Female'];
        $statuses = ['Single', 'Married', 'Divorced', 'Widowed'];
        return view('transaction.cedula.create', ['sex' => $sex, 'statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'community_tax_certificate' => 'required',
            'complete_name' => 'required',
            'date_issue' => 'required|date',
            'address' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required',
            'civil_status' => 'required',
            'citizenship' => 'required',
        ],[
            'community_tax_certificate.required' => 'Community Tax Certificate is required!',
            'complete_name.required' => 'Complete Name is required!' ,
            'date_issue.required' => 'Date Issue is required',
            'date_issue.date' => 'Date Issue must be date',
            'address.required' => 'Address is required',
            'sex.required' => 'Sex is required',
            'date_of_birth.required' => 'Date of Birth is required!',
            'date_of_birth.date' => 'Date of Birth must be date!',
            'place_of_birth.required' => 'Place of Birth is required',
            'civil_status.required' => 'Civil status is required',
            'citizenship' => 'Citizenship is required',
        ]);

        Cedula::create($request->all());

        return redirect(route('transaction.cedula-index'))->with('success', 'New entry has been added');
    }

    public function edit(Cedula $cedula)
    {
        $sex = ['Male', 'Female'];
        $statuses = ['Single', 'Married', 'Divorced', 'Widowed'];
        return view('transaction.cedula.edit', compact('cedula', 'sex', 'statuses'));
    }

    public function update(Request $request, Cedula $cedula)
    {
        $request->validate([
            'community_tax_certificate' => 'required',
            'complete_name' => 'required',
            'date_issue' => 'required|date',
            'address' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required',
            'civil_status' => 'required',
            'citizenship' => 'required',
        ],[
            'community_tax_certificate.required' => 'Community Tax Certificate is required!',
            'complete_name.required' => 'Complete Name is required!' ,
            'date_issue.required' => 'Date Issue is required',
            'date_issue.date' => 'Date Issue must be date',
            'address.required' => 'Address is required',
            'sex.required' => 'Sex is required',
            'date_of_birth.required' => 'Date of Birth is required!',
            'date_of_birth.date' => 'Date of Birth must be date!',
            'place_of_birth.required' => 'Place of Birth is required',
            'civil_status.required' => 'Civil status is required',
            'citizenship' => 'Citizenship is required',
        ]);

        $cedula->update($request->all());
        return redirect(route('transaction.cedula-index'))->with('success', 'Successfully updated');

    }

    public function destroy(Cedula $cedula)
    {
        $cedula->delete();
        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}
