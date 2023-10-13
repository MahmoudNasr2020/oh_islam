<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use App\Models\Werd;
use Illuminate\Http\Request;

class AzkarController extends Controller
{
    public function index($id)
    {
        $categories = Category::all();
        $azkars = Category::with('Azkars')->find($id);
        return view('site.index',['categories'=>$categories,'azkars'=>$azkars]);
    }

    public function werd()
    {
        $werds = Werd::where(['date'=>date('Y-m-d')])->get();
        return view('site.pages.werd',['werds'=>$werds]);
    }

    public function video()
    {

        $video = Video::where(['date'=>date('Y-m-d')])->first();
        return view('site.pages.video',['video'=>$video]);
    }
}
