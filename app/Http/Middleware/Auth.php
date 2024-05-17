<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (auth('user')->check()) {
            $log = $request->user()->roles->name;
            $role = explode(';', $roles);
            if (!in_array($log, $role)) {
?>
                <script>
                    alert('Please login first!');
                    // document.location = window.history.back();
                    document.location = "<?= url('/') ?>";
                </script>
<?php
            }
        }

        return $next($request);
    }
}
