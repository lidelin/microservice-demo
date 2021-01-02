<?php

namespace App\Service;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\Order;
use App\Rpc\Contract\AccountRpc;
use App\Rpc\Contract\InventoryRpc;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Snowflake\IdGeneratorInterface;

class OrderService
{
    /**
     * @Inject
     * @var AccountRpc
     */
    private $accountRpc;

    /**
     * @Inject
     * @var InventoryRpc
     */
    private $inventoryRpc;

    /**
     * @Inject
     * @var IdGeneratorInterface
     */
    private $idGenerator;

    public function create($userId, $productNo, $quantity)
    {
        // temp price
        $price = 666 * 100;
        $amount = $price * $quantity;
        $success = $this->accountRpc->debit($userId, $amount);
        if (!$success) {
            throw new BusinessException(ErrorCode::CREATE_ORDER_FAILED);
        }

        $success = $this->inventoryRpc->deduct($productNo, $quantity);
        if (!$success) {
            throw new BusinessException(ErrorCode::CREATE_ORDER_FAILED);
        }

        $orderNo = $this->idGenerator->generate();

        return Order::create([
            'order_no' => $orderNo,
            'user_id' => $userId,
            'product_no' => $productNo,
            'quantity' => $quantity,
        ]);
    }
}
