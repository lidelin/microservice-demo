<?php

declare (strict_types=1);

namespace App\Model;

/**
 * @property int $id
 * @property string $product_no 产品编号
 * @property int $quantity 库存数量
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \App_Model_Inventory
 */
class Inventory extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
