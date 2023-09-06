<?php

declare(strict_types=1);

namespace Uc\BulkProcessManager;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface BulkActionHandlerInterface
{
    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleCreate(string $entity, Request $request): Response;

    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleUpdate(string $entity, Request $request): Response;

    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleDelete(string $entity, Request $request): Response;

    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleMakeVisible(string $entity, Request $request): Response;

    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleMakeInvisible(string $entity, Request $request): Response;

    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handlePublish(string $entity, Request $request): Response;

    /**
     * @param string                   $entity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleUnpublish(string $entity, Request $request): Response;
}