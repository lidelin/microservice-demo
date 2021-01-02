<?php

declare(strict_types=1);

namespace App\Rpc\Contract;

interface AccountRpc
{
    public function debit(int $userId, int $amount): bool;
}
