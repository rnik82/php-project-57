<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = [ // Поля, доступные для массового заполнения
        'name',
        'description',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
