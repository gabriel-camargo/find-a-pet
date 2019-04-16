<?php

namespace FindAPet\Repositories\Contracts;

interface AdocoesRepositoryInterface
{
    public function recentRequests($owner);
}
