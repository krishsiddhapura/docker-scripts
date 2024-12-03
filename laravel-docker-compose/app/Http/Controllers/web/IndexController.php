<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // Index
    public function index()
    {
        return view('welcome');
    }

    // Upload File
    public function create(Request $request){
        $filename = "file_".time().".".$request->file('input_file')->extension();
        $request->file('input_file')->move(public_path('files'), $filename);
        return response()->json(['success'=>true, 'message'=>'File successfully uploaded.']);
    }
}
