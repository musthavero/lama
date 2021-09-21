<?php

namespace Modules\Menus\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Menus\Entities\MenuItem;

class AppropiateMenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $menuId = 1)
    {
        $_SESSION['menus'] = MenuItem::with('children', 'children.children', 'children.children.children', 'parent')->where('menu_id', $menuId)->where('parent_id', 0)->orderBy('sort')->get();
        return $next($request);
    }
}
