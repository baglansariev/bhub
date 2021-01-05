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
        return isset($this->is_system_role) && $this->is_system_role == 1;
    }

    public function isAdmin()
    {
        return $this->code === 'super_admin';
    }

    public function isStaffRole()
    {
        return isset($this->is_staff) && $this->is_staff == 1;
    }
}
