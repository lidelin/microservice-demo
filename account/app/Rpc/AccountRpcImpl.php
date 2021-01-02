<?php

declare(strict_types=1);

namespace App\Rpc;

use App\Model\Account;
use App\Rpc\Contract\AccountRpc;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="AccountRpc", protocol="jsonrpc-http", server="jsonrpc-http")
 */
class AccountRpcImpl implements AccountRpc
{
    public function debit(int $userId, int $amount): bool
    {
        $updated = Account::query()
            ->where('user_id', $userId)
            ->where('balance', '>=', $amount)
            ->decrement('balance', $amount);

        return $updated == 1;
    }
}
