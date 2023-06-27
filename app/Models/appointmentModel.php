<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentModel extends Model
{
    use HasFactory;

    protected $guard = 'appointmentModel';

    protected $table = 'appointment_tbl';

    protected $guard_name = 'web';

    protected $primaryKey  = 'app_id';

    protected $fillable = [
        'user_id',
        'pet_id',
        'app_type',
        'status',
        'app_date',
        'created_at',
        'app_time',
    ];
}
