<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillExport extends Model
{
    use HasFactory;

    protected $table = 'bills_ban';

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_kh');
    }

}
