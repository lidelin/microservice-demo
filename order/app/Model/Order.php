<?php

declare (strict_types=1);

namespace App\Model;

/**
 * @property int $id
 * @property string $order_no 订单编号
 * @property int $user_id 用户 ID
 * @property string $product_no 产品编号
 * @property int $quantity 产品数量
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Order extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
