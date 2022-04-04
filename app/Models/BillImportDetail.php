<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillImportDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_detail_nhap';

    public function billImport(){
        return $this->belongsTo(BillImport::class, 'id_bill_nhap');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_sp');
    }
}
