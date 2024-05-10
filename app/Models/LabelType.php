<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelType extends Model
{
    use HasFactory;
    protected $table = 'label_type_master';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
