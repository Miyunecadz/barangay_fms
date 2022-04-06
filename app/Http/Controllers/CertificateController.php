<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return view('transaction.certificate');
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);

        return view('transaction.certificate.edit', compact('certificate'));
    }

    public function delete($id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->delete();
        return redirect()->back();
    }

    public function printPreview($id)
    {
        $certificate = Certificate::findOrFail($id);
        $captain = User::find(1);
        return view('transaction.certificate.print', compact('certificate', 'captain'));
    }
}
