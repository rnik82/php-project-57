<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $fillable = [
        'name',  // Разрешаем массовое присваивание для этого поля
    ];
}
