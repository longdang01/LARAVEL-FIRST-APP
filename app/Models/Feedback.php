<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'phan_hoi';
    protected $primaryKey = 'id_phan_hoi';
    public $incrementing = true;
    protected $keyType = 'int';

    public function account(){
        return $this->belongsTo(Account::class, 'id_tk');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_sp');
    }

}
