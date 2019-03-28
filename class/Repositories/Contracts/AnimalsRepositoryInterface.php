<?php

namespace FindAPet\Repositories\Contracts;

interface AnimalsRepositoryInterface
{
    public function listByUser($user);
    public function list($user, $filtro);
    public function checkTotal($user, $filtro);
}
