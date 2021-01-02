<?php

$options = [
    'connect_timeout' => 5.0,
    'recv_timeout' => 5.0,
    'settings' => [
        // 根据协议不同，区分配置
        'open_eof_split' => true,
        'package_eof' => "\r\n",
        // 'open_length_check' => true,
        // 'package_length_type' => 'N',
        // 'package_length_offset' => 0,
        // 'package_body_offset' => 4,
    ],
    // 当使用 JsonRpcPoolTransporter 时会用到以下配置
    'pool' => [
        'min_connections' => 1,
        'max_connections' => 32,
        'connect_timeout' => 10.0,
        'wait_timeout' => 3.0,
        'heartbeat' => -1,
        'max_idle_time' => 60.0,
    ],
];

return [
    'consumers' => [
        [
            'name' => 'AccountRpc',
            'service' => \App\Rpc\Contract\AccountRpc::class,
            'id' => \App\Rpc\Contract\AccountRpc::class,
            'protocol' => 'jsonrpc-http',
            'load_balancer' => 'round-robin',
            'nodes' => [
                ['host' => 'account', 'port' => 9502],
            ],
            'options' => $options,
        ],
        [
            'name' => 'InventoryRpc',
            'service' => \App\Rpc\Contract\InventoryRpc::class,
            'id' => \App\Rpc\Contract\InventoryRpc::class,
            'protocol' => 'jsonrpc-http',
            'load_balancer' => 'round-robin',
            'nodes' => [
                ['host' => 'inventory', 'port' => 9502],
            ],
            'options' => $options,
        ]
    ],
];
