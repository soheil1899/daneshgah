<?php

namespace App\Http\Controllers\Client;

use App\Article;
use App\Article_group;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Setting;
use App\Slider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $menu = Menu::with('articles')->get();
        $peyvand = Article_group::where('id', 7)->with('articles')->first();
        $electro = Article_group::where('id', 8)->with('articles')->first();
        $links = Article_group::where('id', 9)->with('articles')->first();
        return view('welcome' , compact('setting', 'menu', 'peyvand', 'electro', 'links'));
    }

    public function getslider()
    {
        return Slider::all();
    }

    public function getlastnews()
    {
        return Article::where('article_group_id', 6)->orderBy('created_at', 'desc')->limit(10)->get();
    }

    public function getimportantnews()
    {
        return Article::where([['article_group_id',6], ['important', 1]])->orderBy('created_at', 'desc')->limit(20)->get();
    }

    public function articleshow($id, $title)
    {
        $setting = Setting::first();
        $menu = Menu::with('articles')->get();
        $peyvand = Article_group::where('id', 7)->with('articles')->first();
        $electro = Article_group::where('id', 8)->with('articles')->first();
        $links = Article_group::where('id', 9)->with('articles')->first();

        $article = Article::where('id', $id)->first();
        return view('showarticle', compact('setting', 'menu', 'peyvand', 'electro', 'links','article'));
    }

    public function contact()
    {
        $setting = Setting::first();
        $menu = Menu::with('articles')->get();
        $peyvand = Article_group::where('id', 7)->with('articles')->first();
        $electro = Article_group::where('id', 8)->with('articles')->first();
        $links = Article_group::where('id', 9)->with('articles')->first();

        return view('contact', compact('setting', 'menu', 'peyvand', 'electro', 'links'));

    }










}
