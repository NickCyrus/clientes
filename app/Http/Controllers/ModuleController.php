<?php

namespace App\Http\Controllers;

use App\Models\module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //
    public function index(){
        return view('modules.index',['modules'=>module::all()]);
    }
}
