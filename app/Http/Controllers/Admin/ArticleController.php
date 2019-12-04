<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Article_content;
use App\Article_group;
use App\Articleattr;
use App\Filemanager;
use App\Gallery;
use App\Http\Controllers\Permissions;
use App\Keyword;
use App\Pdf;
use App\Tag;
use App\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;


class ArticleController extends Controller
{

    // group

    public function index()
    {
        return view('admin.articlegroup');
    }

    public function getarticlegroups()
    {
        $articlegroups = Article_group::with('articles')->get();
        return $articlegroups;
    }

    public function savegroup(Request $request)
    {
        $this->validate($request, [
            'groupname' => 'required',
        ]);


        if ($request->editflag != false) {
            $save = Article_group::where('id', $request->groupid)->first();
        } else {
            $save = new Article_group();
        }

        $save->name = $request->groupname;
        $save->save();


    }

    public function deletegroup(Request $request)
    {
        $keys = array();
        foreach ($request->groups as $key => $group) {
            if ($group == true) {
                array_push($keys, $key);
            }
        }
        Article_group::whereIn('id', $keys)->delete();
    }


    // article

    public function articles($id)
    {
        $articlegroupid = $id;

        return view('admin.articles', compact('articlegroupid'));
    }


    public function getarticles(Request $request)
    {

        $article = Article_group::where('id', $request->groupid)->with('articles')->first();

        $groups = Article_group::all();

        return [$article, $groups];
    }

    public function savearticle(Request $request)
    {
        if ($request->editflag != false) {
            if ($request->groupid != null and $request->articletitle != null) {
                if ($request->url != null) {
                    Article::where('id', $request->articleid)->update(['url' => '']);
                }
            }
        }

        $this->validate($request, [
            'groupid' => 'required',
            'articletitle' => 'required',
            'url' => 'required | unique:articles',
        ]);


        if ($request->editflag != false) {
            $save = Article::where('id', $request->articleid)->first();
        } else {
            $save = new Article();
            $save->article_group_id = $request->groupid;
        }

        $save->title = $request->articletitle;
        $save->url = $request->url;
        $save->minitext = $request->minitext;
        if ($request->publish == true) {
            $save->publish = true;
        } else {
            $save->publish = false;
        }

        $save->save();


        return $save['id'];
    }

    public function savearticleimage(Request $request)
    {

        $articleid = $request->articleid;

        $image = new ImageManager();
        $image->make($request->image->getRealPath())->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path() . '/media/article/' . $articleid . '_original.png');
        $image->make($request->image->getRealPath())->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path() . '/media/article/' . $articleid . '_medium.png');

        Article::where('id', $articleid)->update(['image' => true]);
    }


    public function deletearticle(Request $request)
    {
        $keys = array();
        foreach ($request->articles as $key => $article) {
            if ($article == true) {
                array_push($keys, $key);
                Storage::disk('media')->deleteDirectory('/article/' . $key);
                Storage::disk('media')->deleteDirectory('/filemanager/article/' . $key);
            }
        }
        Article::whereIn('id', $keys)->delete();

    }


    public function changepublisharticle(Request $request)
    {
        Article::where('id', $request->id)->update(['publish' => $request->publish]);
    }

    public function changeimportantarticle(Request $request)
    {
        Article::where('id', $request->id)->update(['important' => $request->important]);
    }


    public function savearticledes(Request $request)
    {
        Article::where('id', $request->articleid)->update(['description' => $request->des]);
    }


}
