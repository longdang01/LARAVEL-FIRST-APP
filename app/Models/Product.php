<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'san_pham';
    
    public function category(){
        return $this->belongsTo(Category::class, 'id_loai_sp');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_ncc');
    }
}
