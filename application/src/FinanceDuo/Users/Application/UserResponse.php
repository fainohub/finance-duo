<?php

declare(strict_types=1);

namespace FinanceDuo\Users\Application;

use FinanceDuo\Users\Domain\User;
use Shared\Domain\Bus\ResponseInterface;

/**
 * Class UserResponse
 * @package FinanceDuo\Users\Application
 */
class UserResponse implements ResponseInterface
{
    /**
     * @var User
     */
    private User $user;

    /**
     * UserResponse constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            'user' => $this->user()->toArray()
        ];
    }
}
