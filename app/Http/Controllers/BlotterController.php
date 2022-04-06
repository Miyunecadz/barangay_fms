<?php

namespace App\Http\Controllers;

use App\Models\Blotter;
use Illuminate\Http\Request;

class BlotterController extends Controller
{
    public function index()
    {
        return view('transaction.blotter.index');
    }

    public function create()
    {
        return view('transaction.blotter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_of_complainant' => 'required',
            'name_of_defendant' => 'required',
            'case' => 'required'
        ],[
            'name_of_complainant.required' => 'Name of complaint is required!',
            'name_of_defendant.required' => 'Name of defendant is required!',
            'case.required'=> 'Case is required!'
        ]);

        Blotter::create($request->all());

        return redirect(route('transaction.blotter-index'))->with('success', 'New entry has been added to the database!');
    }

    public function edit(Blotter $blotter)
    {
        return view('transaction.blotter.edit', compact('blotter'));
    }

    public function update(Request $request, Blotter $blotter)
    {
        $request->validate([
            'name_of_complainant' => 'required',
            'name_of_defendant' => 'required',
            'case' => 'required'
        ],[
            'name_of_complaint.required' => 'Name of complaint is required!',
            'name_of_defendant.required' => 'Name of defendant is required!',
            'case.required'=> 'Case is required!'
        ]);

        $blotter->update($request->all());
        return redirect(route('transaction.blotter-index'))->with('success', 'Successfully updated!');
    }

    public function destroy(Blotter $blotter)
    {
        $blotter->delete();
        return redirect()->back()->with('success', 'Successfull deleted!');
    }
}
