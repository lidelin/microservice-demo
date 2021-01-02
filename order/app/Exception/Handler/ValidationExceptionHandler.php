<?php

namespace App\Exception\Handler;

use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Codec\Json;
use Hyperf\Validation\ValidationExceptionHandler as BaseExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ValidationExceptionHandler extends BaseExceptionHandler
{
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();

        /** @var \Hyperf\Validation\ValidationException $throwable */
        $message = $throwable->validator->errors()->first();

        $data = Json::encode(['message' => $message]);

        return $response
            ->withAddedHeader('content-type', 'application/json; charset=utf-8')
            ->withStatus($throwable->status)
            ->withBody(new SwooleStream($data));
    }
}
