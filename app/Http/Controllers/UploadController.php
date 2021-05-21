<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('logo')) {
//            $file = $request->file('logo');
//            $fileName = $file->getClientOriginalName();
//            $folder = uniqid() . '-' . now()->timestamp;
//            $file->storeAs('logo/temp/' . $folder, $fileName);
            $file_path = $request->logo->store('hospital/logo', 'public');
            return $file_path;
        }
        return '';
    }

    public function delete(Request $request)
    {
        @unlink(public_path('storage/'.request()->getContent()));
    }
}
