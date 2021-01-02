<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Order;
use App\Service\OrderService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Hyperf\Validation\ValidationException;

class OrderController extends AbstractController
{
    /**
     * @Inject()
     * @var ValidatorFactoryInterface
     */
    protected $validationFactory;
    /**
     * @Inject
     * @var OrderService
     */
    private $orderService;

    public function store(RequestInterface $request)
    {
        $validator = $this->validationFactory->make(
            $request->all(), [
                'user_id' => 'required|integer',
                'product_no' => 'required|string',
                'quantity' => 'required|between:1,100',
            ]
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this->orderService->create(
            $request->input('user_id'),
            $request->input('product_no'),
            $request->input('quantity')
        );
    }

    public function show($orderNo)
    {
        return Order::where('order_no', $orderNo)->first();
    }
}
