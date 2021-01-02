<?php

declare (strict_types=1);

namespace App\Model;

use Carbon\Carbon;

/**
 * @property int $id
 * @property int $user_id 用户 ID
 * @property int $balance 账户余额，单位：分
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Account extends Model
{
    protected $fillable = [
        'user_id',
        'balance'
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'balance' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
