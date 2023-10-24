<?php

namespace app\Repository;

use App\Entity\User;

interface UserRepository
{
    /**
     * @param string $userId
     * @return User|null
     */
    public function findById(string $userId): ?User;
}
