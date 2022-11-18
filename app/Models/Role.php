<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = [
        'name',

    ];
    /**
     * The users that belong to the  role
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
    
    //role belongs to many permissions
    public function permissions() {

        return $this->belongsToMany(Permission::class,'role_permission');
            
     }

    //  public function hasPermission($permission)
    //  {
 
    //      return (bool) $this->permissions->where('name', $permission->name)->count();
        
    //  }
 
    //  public function getAllPermissions(array $permissions)
    //  {
 
    //      return Permission::whereIn('name', $permissions)->get();
    //  }
}
