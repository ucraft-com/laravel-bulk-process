<?php

declare(strict_types=1);

namespace Uc\BulkProcessManager\Facades;

use Bulkprocess\BulkProcess;
use Illuminate\Support\Facades\Facade;
use Uc\BulkProcess\BulkProcessExecutor\BulkProcessExecutor;
use Uc\BulkProcess\BulkProcessExecutor\Enums\Entity;
use Uc\BulkProcess\BulkProcessExecutor\Enums\Operation;

/**
 * @method static BulkProcess createBulkProcess(int $projectId, array $idsToProcess, Entity $entity, Operation $operation)
 * @method static BulkProcess getBulkProcess(string $processId)
 *
 * @uses \Uc\BulkProcess\BulkProcessExecutor\BulkProcessExecutor
 */
class BulkProcessManager extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return BulkProcessExecutor::class;
    }
}