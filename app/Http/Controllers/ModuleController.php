<?php

namespace App\Http\Controllers;

use App\Models\Icons;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //
    public function index(){
        return view('modules.index',['modules'=>Module::all() , 'icons'=>Icons::all()]);
    }

     public function storage(Request $r){
                
            $r->validate([
                     'moduleslug' => [
                        'required',
                        'unique:modules,slug' 
                    ], [
                        'namesvg.required' => 'El slug es obligatorio',
                        'namesvg.unique' => 'El slug ya existe'
                    ]
            ]);

            $data = ['slug'=>$r->moduleslug , 'name'=>$r->module, 'icon'=>$r->icono , 'enabled'=>$r->active ?? 0 ,  'created_at'=>now()];

            Module::create($data);
            return jSuccess([
                                'msg' => 'Modulos creado correctamente',
                                'info' => $data
                            ]);
    }
}
