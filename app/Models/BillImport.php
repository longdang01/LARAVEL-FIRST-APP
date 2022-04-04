<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillImport extends Model
{
    use HasFactory;

    protected $table = 'bills_nhap';

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_ncc');
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'id_nhanvien');
    }
}
