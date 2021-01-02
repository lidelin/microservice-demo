<?php

declare(strict_types=1);

namespace App\Rpc\Contract;

interface InventoryRpc
{
    public function deduct(string $productNo, int $quantity): bool;
}
