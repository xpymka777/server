<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
    ];

    protected static function booted()
    {
        static::created(function ($discipline) {
            $discipline->save();
        });
    }
}