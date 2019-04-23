<?php

namespace FindAPet\Repositories\Contracts;

interface AdocoesRepositoryInterface
{
    public function list($owner);
    public function recentRequests($owner);
}
