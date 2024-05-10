<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredefinedTransaction extends Model
{
    use HasFactory;
    protected $table = 'predefined_transaction';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];
}
