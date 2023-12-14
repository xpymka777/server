<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'type',
    ];

    protected static function booted()
    {
        static::created(function ($division) {
            $division->save();
        });
    }
}