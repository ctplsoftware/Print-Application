<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role_id',
        'unit_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roleDetails()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    // public function usernameproduct(){
    //     return $this->hasmany(User::class, 'approved_by', 'id');
    // }
    public function checkPermission($permissionName)
    {
        // dd($permissionName);
        $roleId = Auth::user();
        // dd($roleId);
        if ($permissionName[0] == 'product_create') {
            $permissionId = 1;
        }
        elseif($permissionName[0] == 'product_edit'){
            $permissionId = 2;
        }
        elseif($permissionName[0] == 'product_view'){
            $permissionId = 3;
        }
        elseif($permissionName[0] == 'configuration_view'){
            $permissionId = 7;
        }
        elseif($permissionName[0] == 'configuration_update'){
            $permissionId = 8;
        }
        elseif($permissionName[0] == 'user_create'){
            $permissionId = 11;
        }
        elseif($permissionName[0] == 'user_edit'){
            $permissionId = 12;
        }
        elseif($permissionName[0] == 'user_view'){
            $permissionId = 13;
        }
        elseif($permissionName[0] == 'role_create'){
            $permissionId = 15;
        }
        elseif($permissionName[0] == 'role_edit'){
            $permissionId = 16;
        }
        elseif($permissionName[0] == 'role_view'){
            $permissionId = 14;
        }
        elseif($permissionName[0] == 'transaction_view'){
            $permissionId = 4;
        }
        elseif($permissionName[0] == 'transaction_create'){
            $permissionId = 5;
        }
        elseif($permissionName[0] == 'transaction_reprint'){
            $permissionId = 6;
        }
        elseif($permissionName[0] == 'product_approve'){
            $permissionId = 17;
        }
        elseif($permissionName[0] == 'label_approve'){
            $permissionId = 18;
        }
        elseif($permissionName[0] == 'label_edit'){
            $permissionId = 19;
        }
        elseif($permissionName[0] == 'report_view'){
            $permissionId = 20;
        }
        elseif($permissionName[0] == 'label_view'){
            $permissionId = 10;
        }
        elseif($permissionName[0] == 'label_create'){
            $permissionId = 9;
        }
        
        return Rolehaspermission::where('role_id',$roleId->role_id)->where('permission_id', $permissionId)->exists();
    }
}
