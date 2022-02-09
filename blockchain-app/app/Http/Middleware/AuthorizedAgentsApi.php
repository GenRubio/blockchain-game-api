<?php

namespace App\Http\Middleware;

use App\Services\AuthorizedApiAgentService;
use Closure;
use Illuminate\Http\Request;

class AuthorizedAgentsApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $authorizedApiAgents = (new AuthorizedApiAgentService())->getAllAuthorizedAgent();
        if (
            !in_array(request()->ip(), $authorizedApiAgents)
            && !in_array(request()->getHttpHost(), $authorizedApiAgents)
        ) {
            return response()->json(array(
                'success' => false,
                'message' => 'You are blocked to call API!'
            ));
        }

        return $next($request);
    }
}
