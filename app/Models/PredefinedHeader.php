<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredefinedHeader extends Model
{
    use HasFactory;
    protected $table = 'predefined_header';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function printtransaction()
    {
        return $this->belongsTo(PredefinedTransaction::class, 'predefine_header_id', 'id');
    }
}
