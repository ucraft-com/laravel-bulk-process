<?php

declare(strict_types=1);

use Grpc\ChannelCredentials;

return [
    'orchestrator_grpc_endpoint' => env('BULK_ACTIONS_ORCHESTRATOR_ENDPOINT', 'localhost:50051'),
    'credentials'                => ChannelCredentials::createInsecure(),
];