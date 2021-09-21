<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Menus\Entities\MenuItem;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

//    public function __construct() {
//        if (Gate::denies('access-backend')) {
//            abort(403);
//        }
//    }

    public function index()
    {
        $menuId = 1;
        $menus = Cache::remember('menu_'.$menuId, 36400, function () use ($menuId) {
            return MenuItem::with('children','children.children','children.children.children','parent')->where('menu_id',$menuId)->where('parent_id',0)->orderBy('sort')->get();
        });
        return view('backend::index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('backend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('backend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('backend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
