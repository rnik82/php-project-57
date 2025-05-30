<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ // Поля, доступные для массового заполнения
        'name',
        'description',
        'status_id',
        'created_by_id',
        'assigned_to_id',
    ];

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id'); // всегда внешний ключ
    }
}
