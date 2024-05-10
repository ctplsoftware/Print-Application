<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicTransactionBulkUpload extends Model
{
    use HasFactory;
    protected $table = 'bulkupload_dynamictransaction';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}
