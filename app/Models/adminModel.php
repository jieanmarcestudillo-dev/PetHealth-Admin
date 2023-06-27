<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminModel extends Authenticatable
{
    use HasFactory;

    protected $guard = 'adminModel';

    protected $table = 'admin_tbl';

    protected $guard_name = 'web';

    protected $primaryKey  = 'admin_id';

    protected $fillable = [
        'email',
        'password',
        'admin_name',
    ];

    protected $hidden = [
        'password',
    ];
}
