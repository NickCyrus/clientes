<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    use LogsActivity;
    protected $guarded = [];
    //
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function render(){
           return $this->svg ?? ''; 
    }

    static function GetBySlug($slug){
      return self::where('slug', $slug)->first() ?? new self;
    }
}
