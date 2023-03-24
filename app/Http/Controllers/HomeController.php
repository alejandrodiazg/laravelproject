<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $articles = Articles::where('status', '1')
        ->orderBy('id', 'desc')
        ->simplePaginate(10);

        $navbar = Categories::where([['status', '1'],['is_featured', '1']])
        ->Paginate(3);

        return view('home.index', compact('articles', 'navbar'));
    }

    public function all()
    {

        $categories = Categories::where('status', '1')
        ->simplePaginate(20);
        
        $navbar = Categories::where([['status', '1'], ['is_featured', '1']])
        ->Paginate(3);

        return  view('home.all-categories', compact('categories', 'navbar'));

    }
}
