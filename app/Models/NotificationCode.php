<?php

namespace App\Models;

use App\Services\NotificationCode\Enum\NotificationCodeStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'status',
    ];

    protected $casts = [
        'status' => NotificationCodeStatusEnum::class,
    ];
}
