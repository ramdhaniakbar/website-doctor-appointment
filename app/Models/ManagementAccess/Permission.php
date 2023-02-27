<?php

namespace App\Models\ManagementAccess;

use App\Models\ManagementAccess\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ManagementAccess\PermissionRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use SoftDeletes;

    // declare table
    public $table = 'permission';

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
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    // one to many
    public function permission_role()
    {
        // 2 parameters (path model, field foreign key)
        return $this->hasMany(PermissionRole::class, 'permission_id');
    }
}
