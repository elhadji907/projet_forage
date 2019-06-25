<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        
        $rolesAny = explode("|", $roles);

        //cette requette nous permet de vérifier si l'utilisateur connecté n'a pas un des role passé en paramètre
        if (! $request->user()->hasAnyRoles($rolesAny)) {

            flash("Vous devez être connecté pour voir cette page !")->error();
        
            return redirect("/login");
        }
        return $next($request);
    }
}


/* this->middleware('roles: Administrateur|Gestionnaire'); */