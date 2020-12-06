<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Permission;

class Role extends Model
{
    protected $guarded = [];

    public $system_roles = [
        'super_admin',
        'admin',
        'moderator',
        'journalist',
        'investor',
        'entrepreneur',
        'worker',
        'student',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function isSystemRole()
    {
        return in_array($this->code, $this->system_roles);
    }

    public function staffRoles()
    {
        return [
            'super_admin',
            'admin',
            'moderator',
            'journalist',
        ];
    }
}
