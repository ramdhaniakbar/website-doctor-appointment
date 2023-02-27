<?php

namespace App\Models\ManagementAccess;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementAccess\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ManagementAccess\PermissionRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use SoftDeletes;

    // declare table
    public $table = 'role';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // many to many 
    // gausah nentuin field penghubung
    public function user()
    {
        return $this->belongsToMany(User::class);
    } 

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    // one to many
    public function role_user()
    {
        // 2 parameters (path model, field foreign key)
        return $this->hasMany(RoleUser::class, 'role_id');
    }

    // one to many
    public function permission_role()
    {
        // 2 parameters (path model, field foreign key)
        return $this->hasMany(PermissionRole::class, 'role_id');
    }
}
