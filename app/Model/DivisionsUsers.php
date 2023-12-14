<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DivisionsUsers extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function booted()
    {
        static::created(function ($divisionsUsers) {
            $divisionsUsers->save();
        });
    }

    public function getDivision(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'id_division', 'id');
    }

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}