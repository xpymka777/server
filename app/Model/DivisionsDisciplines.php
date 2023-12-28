<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionsDisciplines extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_division',
        'id_discipline'
    ];
    protected static function booted()
    {
        static::created(function ($divisionsDisciplines) {
            $divisionsDisciplines->save();
        });
    }
}