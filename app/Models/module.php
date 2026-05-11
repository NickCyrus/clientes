<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Scopes\ErraseeScope;

class Module extends Model
{
    use LogsActivity;
    protected $guarded = [];
    protected $appends = ['svg'];
    //

    protected static function booted(): void
    {
        static::addGlobalScope(new ErraseeScope);
    }
 
    static function findBySlug($slug){
        return self::where('slug',$slug)->exists();
    }


    protected function Svg(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->icon) ? Icons::GetBySlug($this->icon)->svg : ''
        );
    }

     
}
