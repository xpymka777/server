<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DisciplinesUsers extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_discipline',
        'id_user',
    ];
    protected static function booted()
    {
        static::created(function ($disciplinesUsers) {
            $disciplinesUsers->save();
        });
    }

    public function getDiscipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'id_discipline', 'id');
    }

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}