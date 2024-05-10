<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function user(){
        return $this->hasMany(User::class);
     }
 
     public static function getRoleName($id){
         $role = self::where('id',$id)->first();
         if($role){
             return $role->roles; 
         }
         else{
             return null;
         }
     }
}
