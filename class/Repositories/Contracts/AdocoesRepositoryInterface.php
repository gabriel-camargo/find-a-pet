<?php

namespace FindAPet\Repositories\Contracts;

interface AdocoesRepositoryInterface
{
    public function list($owner);
    public function listUsers($animal);
    public function myRequests($usu_id);
}
