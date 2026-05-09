<?php

namespace App\Http\Controllers;

use App\Models\Icons;
use Illuminate\Http\Request;

class IconsController extends Controller
{
    //

    public function index(){
        return view('icons.index',['icons'=>Icons::all()]);
    }

    public function list(){
         return Icons::orderBy('id','DESC')->get();
    }

    public function nameckeck(Request $r){

            $existe = Icons::where(
                'slug',
                $r->slug
            )->exists();

            return response()->json([
                'exists' => $existe
            ]);
            
    }

    public function storage(Request $r){
                
            $r->validate([
                     'namesvg' => [
                        'required',
                        'unique:icons,slug' 
                    ], [
                        'namesvg.required' => 'El slug es obligatorio',
                        'namesvg.unique' => 'El slug ya existe'
                    ]
            ]);

            $data = ['slug'=>$r->namesvg , 'svg'=>$r->svgcode, 'created_at'=>now()];

            Icons::create($data);
            return response()->json([
                'msg' => 'Icono creado correctamente',
                'icon' => $data
            ],200);
    }
}
