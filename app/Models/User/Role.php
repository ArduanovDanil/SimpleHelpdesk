<?php

namespace App\Models\User;


use App\Enums\User\RoleEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
    ];

    public $timestamps = false;

    public function scopeWhereClient(Builder $query)
    {
        $query->where('code', RoleEnum::CLIENT);
    }


}
