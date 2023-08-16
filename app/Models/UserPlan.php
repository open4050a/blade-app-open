<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'mst_plan_id',
        'price_type',
        'start_date',
        'end_date',
        'delete_flag',
    ];

    //protected $dateFormat = 'Y年m月d日 H:i:s';
}
