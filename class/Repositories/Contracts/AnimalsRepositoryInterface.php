<?php

namespace FindAPet\Repositories\Contracts;

interface AnimalsRepositoryInterface
{
    public function listByUser($user);
    public function list($user, $filtro, $page, $perPage);
    public function checkTotal($user, $filtro);
}
