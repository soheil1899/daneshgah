<?php

namespace App\Http\Controllers\Admin;

use App\Filemanager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;


class FilemanagerController extends Controller
{
    public function getfilemanager(Request $request)
    {
        return Filemanager::where('folderid', $request->articleid)->get();
    }


    public function savefile(Request $request)
    {
        $randomnum = rand(1000, 9999);
        $image = new ImageManager();

        $path = 'filemanager/';
        $newfolder = $request->articleid;

        Storage::disk('media')->makeDirectory($path . $newfolder);

        $image->make($request->image->getRealPath())->save(public_path() . '/media/' . $path . $newfolder . '/item_' . $randomnum . '.png');
        $image->make($request->image->getRealPath())->resize('70', '70')->save(public_path() . '/media/' . $path . $newfolder . '/itemsmall_' . $randomnum . '.png');

        $save = new Filemanager();
        $save->image = $randomnum;
        $save->folderid = $request->articleid;

        $save->save();

        return $randomnum;
    }
}
