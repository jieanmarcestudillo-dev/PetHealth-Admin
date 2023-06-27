<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petModel extends Model
{
    use HasFactory;

    protected $guard = 'petModel';

    protected $table = 'pet_tbl';

    protected $guard_name = 'web';

    protected $primaryKey  = 'pet_id';

    protected $fillable = [
        'pet_name',
        'pet_cm',
        'pet_breed',
        'birthdate',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];
}
