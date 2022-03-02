<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuCategory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

      public function menucategory(){
        return $this->belongsTo(MenuCategory::class,'category_id','id');
    }
}
