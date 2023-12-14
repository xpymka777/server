<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
    ];

    protected static function booted()
    {
        static::created(function ($position) {
            $position->save();
        });
    }
}