<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\module;
use Illuminate\Http\Request;

class ApirestController extends Controller
{
    //

    public function exists(Request $ajax){

   
        if(!isset($ajax->type)) return jError(['errormsg'=>'Debe definir el attributo type']);
        switch($ajax->type){
            case 'module':
                return jSuccess(['exists'=>module::findBySlug($ajax->slug)]);
            break;
        }


    }

}
