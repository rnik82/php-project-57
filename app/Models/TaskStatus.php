<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',  // Разрешаем массовое присваивание для этого поля
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'status_id'); // всегда внешний ключ
    }
}
