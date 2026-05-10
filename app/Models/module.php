<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use LogsActivity;
    protected $guarded = [];
    
    //

    static function findBySlug($slug){
        return self::where('slug',$slug)->exists();
    }
}
