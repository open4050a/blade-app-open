<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class MstPlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'plan_id',
        'plan_name',
        'adult_price',
        'child_price',
        'explanation',
        'delete_flag',
    ];

    public function scopeExcludeDelFlagOne(Builder $query): void
    {
        $query->where('delete_flag', '<>', 1);
    }

    public function scopeKeyword(Builder $query, string $keyword): void
    {
        $query->where('plan_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('explanation', 'LIKE', '%' . $keyword . '%');
    }
}
