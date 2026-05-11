<?php

namespace App\Http\Controllers;

use App\Models\Icons;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //
    public function index(){
        return view('modules.index',['modules'=>Module::paginate(1) , 'icons'=>Icons::all()]);
    }

    public function list(Request $r){
        $query = Module::query();
        if (isset($r->search)){
            $query->where('name','like',"%{$r->search}%");
        }
        return  $query->paginate(numberByPage());
    }
    
    public function storage(Request $r){
                
            $r->validate([
                     'moduleslug' => [
                        'required',
                        "unique:modules,slug,{$r->id}" 
                    ], [
                        'namesvg.required' => 'El slug es obligatorio',
                        'namesvg.unique' => 'El slug ya existe'
                    ]
            ]);

            $data = ['slug'=>$r->moduleslug , 'name'=>$r->module, 'icon'=>$r->icono , 'enabled'=>$r->active ?? 0 ,  'created_at'=>now()];
            if (!isset($r->id))
                Module::create($data);
            else{
                unset($data['created_at']);
                $data['updated_at'] = now();
                Module::find($r->id)->update($data);
            }

            return jSuccess([
                                'msg' => 'Modulos creado correctamente',
                                'info' => $data
                            ]);
    }

    public function edit(Request $r){
        return Module::find($r->id) ;
    }

    public function delete(Request $r){
        Module::where('id',$r->id)->update(['erased'=>1,'erased_user_id'=>active_user()->id]) ;
        return jSuccess(['msg' => 'Modulos borrado correctamente']);
    }

    
}
