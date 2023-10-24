<?php

declare(strict_types=1);

namespace App\Entity;

class User
{
    /**
     * @param string $userId
     * @param string $name
     * @param string|null $subscriberId
     */
    public function __construct(
        public string $userId,
        public string $name,
        public ?string $subscriberId,
    ) {}

    /**
     * @return bool
     */
    public function isSubscriber(): bool
    {
        return !!$this->subscriberId;
    }
}