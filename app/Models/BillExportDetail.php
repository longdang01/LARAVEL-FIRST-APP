<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillExportDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_detail_ban';

    public function billExport(){
        return $this->belongsTo(BillExport::class, 'id_bill_ban');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_sp');
    }
}
