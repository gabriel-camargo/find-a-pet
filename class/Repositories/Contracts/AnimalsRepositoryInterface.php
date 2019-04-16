<?php

namespace FindAPet\Repositories\Contracts;

interface AnimalsRepositoryInterface
{
    public function listByUser($user);
    public function list($user, $filtro, $page, $perPage, $animaisPendentes);
    public function checkTotal($user, $filtro, $animaisPendentes);
    public function pendentAnimals($userId);
}
