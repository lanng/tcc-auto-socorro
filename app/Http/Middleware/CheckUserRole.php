<?php

namespace App\Http\Middleware;

use App\Role\RoleChecker;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    protected RoleChecker $roleChecker;
    public function __construct(RoleChecker $roleChecker)
    {
        $this->roleChecker = $roleChecker;
    }

    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::guard()->user();

        if (!$this->roleChecker->check($user, $role)){
            throw new AuthorizationException('Você não tem autorização para visualizar essa página!');
        }
        return $next($request);
    }
}
