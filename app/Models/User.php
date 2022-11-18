<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'email',
        'password',
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
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function HasPermission($permission)
    {
        $permissionchk = '';
        foreach ($this->roles as $role) {
            foreach ($role->permissions as $UserPermission) {
                if ($UserPermission->name == $permission) {
                    $permissionchk = $UserPermission->name;
                }
            }
        }

        if ($permissionchk != '') {
            return true;
        } else {
            return false;
        }

        //
        // foreach ($this->roles as $role) {
        //     foreach ($role->permissions as $permissionss) {
        //         if ($permissionss->name == $permission) {
        //             return true;
        //         }
        //     }
        // }

        // return false;
    }

    public function HasAnyPermissions(array $UserPermission)
    {
        $permissionList = [];
        foreach ($this->roles as $role) {
            foreach ($role->permissions as $permission) {
                if (in_array($permission->name, $UserPermission)) {
                    $permissionList = $UserPermission;
                }
            }
        }
        if (sizeof($permissionList) > 0) {
            return true;
        } else {
            return false;
        }
        //    return $permissionList;
    }

    public function HasAllPermissions(array $UserPermission)
    {
        $permissionList = [];
        foreach ($this->roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionList[] = $permission->name;
            }
        }

        $filter_array = array_unique($permissionList);
        $containsAllValues = !array_diff($UserPermission, $filter_array);
        return    $containsAllValues;
       
    }
}
