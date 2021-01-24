<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuPage;

class MenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   	public function index()
    {
        $menus = Menu::OrderBy('created_at','DESC')->get();
        return view('admin.menu.index')->with('menus', $menus);
    }

   	public function create()
    {
        return view('admin.menu.add');
    }

    public function store(Request $request)
    {        
        $menus = Menu::storeMenu($request);
        return redirect()->route('menu.index')->with('success','Menu Created!');
    }

    public function edit($id)
    {
        $menus = Menu::find($id);
        return view('admin.menu.edit')->with('menus',$menus);
    }

    public function update(Request $request, $id)
    {   
        $menus = Menu::editMenu($request,$id);
        return redirect()->route('menu.index')->with('success','Menu Updated!');
    }

    public function destroy($id)
    {
        $menus = Menu::findOrFail($id);
        $menus->delete();
        return redirect()->route('menu.index')->with('success','Menu Deleted!');
    }
}
