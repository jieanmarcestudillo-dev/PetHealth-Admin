<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{
    use HasFactory;

    protected $guard = 'usersModel';

    protected $table = 'users';

    protected $guard_name = 'web';

    protected $primaryKey  = 'user_id';

    protected $fillable = [
        'user_fname',
        'user_lname',
        'contact',
        'address',
        'email',
    ];

    protected $hidden = [
        'password',
    ];
}
