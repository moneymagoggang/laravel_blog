<?php

namespace App\Services;

use App\Http\Requests\Post\CommentRequest;
use App\Repositories\CommentRepository;

class CommentService
{
    protected CommentRepository $repository;
    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }
    public function store(CommentRequest $request)
    {
        return $this->repository->store($request);
    }
}
