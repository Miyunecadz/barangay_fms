<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function open(Request $request)
    {
        $section = explode('/',$request->file);
        array_splice($section, 0 , 1);
        $newPath = implode("/",$section);
        $filePath = "/ViewerJS/#../storage/" . $newPath;
        return view('file', ['file' => $filePath]);
    }
}
