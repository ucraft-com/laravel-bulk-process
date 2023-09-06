<?php

declare(strict_types=1);

namespace Uc\BulkProcessManager;

use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Uc\BulkProcess\BulkProcessExecutor\BulkProcessExecutor;
use Uc\BulkProcess\BulkProcessExecutor\Client\BulkProcessClient;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => $this->app->configPath('bulk-process-manager.php'),
            ]);
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/webhook-routes.php');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(BulkProcessExecutor::class, function () {
            /** @var \Illuminate\Contracts\Config\Repository $configRepository */
            $configRepository = $this->app->get(ConfigRepository::class);

            return new BulkProcessExecutor(
                new BulkProcessClient(
                    $configRepository->get('bulk-process-manager.orchestrator_grpc_endpoint'),
                    [
                        'credentials' => $configRepository->get('bulk-process-manager.credentials'),
                    ],
                )
            );
        });
    }
}