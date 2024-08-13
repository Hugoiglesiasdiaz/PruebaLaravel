<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];  
    public function getRouteKeyName()
    {
        return 'url';
    }
    
    public function category(){
        
    return $this->belongsTo(Category::class);
    
    }

}
