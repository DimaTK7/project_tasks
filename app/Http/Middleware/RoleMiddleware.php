<?php

namespace App\Http\Middleware;

use App\Http\Services\Helpers\FlashMassageService;
use Closure;

class RoleMiddleware
{
    private $message;

    public function __construct(FlashMassageService $service)
    {
        $this->message = $service;
    }

    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!auth()->user()->hasRole($role)) {
            $this->message->setAccessDenied();
            return redirect()->back();
        }

        if ($permission !== null && !auth()->user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
