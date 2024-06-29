<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReprintTransaction extends Model
{
    use HasFactory;
    protected $table = 'reprint_transaction';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

}
