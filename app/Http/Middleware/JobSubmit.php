<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use DebugBar\DebugBar;

class JobSubmit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('frontend.user.account')
                ->withFlashDanger(trans('auth.unauthorized'));
        }

        if (!$this->isUserCompleted()) {
            return redirect()
                ->route('frontend.user.account')
                ->withFlashDanger(trans('alerts.frontend.jobs.publish.not_complete'));
        }

        return $next($request);
    }

    private function isUserCompleted()
    {
        $user = Auth::user();

        return $user->tel && $user->id_number && $user->real_name;
    }
}
