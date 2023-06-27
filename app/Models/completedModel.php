<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class completedModel extends Model
{
    use HasFactory;

    protected $guard = 'completedModel';

    protected $table = 'completed_tbl';

    protected $guard_name = 'web';

    protected $primaryKey  = 'completed_id';

    protected $fillable = [
        'user_id',
        'pet_id',
        'app_type',
        'name_of_medicine',
        'pet_weight',
        'app_date',
        'updated_at',
        'created_at',
    ];
}
