<?php

namespace App\Models\ManagementAccess;

use App\Models\MasterData\TypeUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory; 
    use SoftDeletes;

    // declare table
    public $table = 'detail_user';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable = [
        'user_id',
        'type_user_id',
        'content',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to one
    public function user()
    {
        // 3 parameters (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // one to many
    public function type_user()
    {
        // 3 parameters (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo(TypeUser::class, 'type_user_id', 'id');
    }
}
