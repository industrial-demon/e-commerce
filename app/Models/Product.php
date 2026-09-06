<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function scopeDraft(Builder $query)
    {
        return $query->where(
            'status',
            '=',
            'draft'
        );
    }

    public function scopeStatus(Builder $query, string $status)
    {
        return $query->where(
            'status',
            '=',
            $status
        );
    }
}
