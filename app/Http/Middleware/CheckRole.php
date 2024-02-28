<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check()) {
            return redirect()->intended('auth/login?destination='.$_SERVER['REQUEST_URI']);
        }
        $id_user = Session::get('user._id');
        $user = User::find($id_user);
        if(in_array('Admin', $user['roles'])) return $next($request);
        foreach($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if(in_array($role, $user['roles']))
            return $next($request);
        }
        return redirect()->intended('auth/not-permis');
    }
}
?>
