<?php

declare(strict_types=1);

namespace App\Rpc;

use App\Model\Inventory;
use App\Rpc\Contract\InventoryRpc;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="InventoryRpc", protocol="jsonrpc-http", server="jsonrpc-http")
 */
class InventoryRpcImpl implements InventoryRpc
{
    public function deduct(string $productNo, int $quantity): bool
    {
        $updated = Inventory::query()
            ->where('product_no', $productNo)
            ->where('quantity', '>=', $quantity)
            ->decrement('quantity', $quantity);

        return $updated == 1;
    }
}
