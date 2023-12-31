<?php

declare(strict_types=1);

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Uc\BulkProcessManager\BulkActionHandlerInterface;

Route::prefix('bulk-process')->name('bulk-process.')->group(function (Router $router): void {
    $router->post('/{entity}', [BulkActionHandlerInterface::class, 'handleCreate'])->name('create');
    $router->put('/{entity}', [BulkActionHandlerInterface::class, 'handleUpdate'])->name('update');
    $router->patch('/{entity}/make-visible', [BulkActionHandlerInterface::class, 'handleMakeVisible'])->name('make-visible');
    $router->patch('/{entity}/make-invisible', [BulkActionHandlerInterface::class, 'handleMakeInvisible'])->name('make-invisible');
    $router->patch('/{entity}/publish', [BulkActionHandlerInterface::class, 'handlePublish'])->name('publish');
    $router->patch('/{entity}/unpublish', [BulkActionHandlerInterface::class, 'handleUnpublish'])->name('unpublish');
    $router->delete('/{entity}', [BulkActionHandlerInterface::class, 'handleDelete'])->name('delete');
});