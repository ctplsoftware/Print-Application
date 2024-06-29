<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReprintHeader extends Model
{
    use HasFactory;
    protected $table = 'reprint_header';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function printtransaction()
    {
        return $this->belongsTo(ReprintTransaction::class, 'predefine_header_id', 'id');
    }
    


}
