<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Azkar;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $azkars = Category::with('Azkars')->inRandomOrder()->first();
        return view('site.index',['categories'=>$categories,'azkars'=>$azkars]);
    }
}
