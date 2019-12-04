<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Article_group;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu');
    }
    public function getmenus()
    {
        $articlegroups = Article_group::all();
        $articles = Article::all();
        $menus = Menu::all();
        return [$menus, $articlegroups, $articles];
    }

    public function savemenu(Request $request)
    {
        if ($request->menuid){
            Menu::where('id', $request->menuid)->update(['url'=>null]);
        }
        $this->validate($request, [
            'name' => 'required',
            'url' => 'nullable | unique:menus',
        ]);

        if ($request->menuid != null){
            $save = Menu::where('id', $request->menuid)->first();
        } else{
            $save = new Menu();
        }
        $save->name = $request->name;
        if ($request->group != null){
            if ($request->article != null){
                $save->article_id = $request->article['id'];
                $save->url = $request->article['url'];
            }else{
                $save->article_group_id = $request->group['id'];
            }
        }else{
            $save->url = $request->url;
        }
        $save->save();
    }

    public function deletemenu(Request $request)
    {
        Menu::where('id', $request->id)->delete();
    }


}
