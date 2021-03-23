<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Exception;
use FinanceDuo\Auth\Application\Authorize\TokenAuthorizer;
use FinanceDuo\Auth\Domain\Token;
use FinanceDuo\Users\Domain\NotFoundUser;
use Illuminate\Http\Request;

/**
 * Class AuthMiddleware
 * @package App\Http\Middleware
 */
class AuthMiddleware
{
    /**
     * @var TokenAuthorizer
     */
    private TokenAuthorizer $authorizer;

    /**
     * AuthMiddleware constructor.
     * @param TokenAuthorizer $authorizer
     */
    public function __construct(TokenAuthorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws NotFoundUser
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('Authorization')) {
            throw new Exception('Not found Token Header');
        }

        $token = new Token(str_replace('Bearer ', '', $request->header('Authorization')));

        $user = ($this->authorizer)($token);

        $request->merge([
            'user_id' => $user->id()->value()
        ]);

        return $next($request);
    }
}
