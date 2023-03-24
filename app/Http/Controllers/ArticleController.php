<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = Auth::user();
        $articles = Articles::where('user_id', $user->id)
        ->orderBy('id', 'desc')
        ->simplePaginate(10);
        return view('admin.articles.index', compact('user', 'articles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categories::select('id', 'name')
        ->where('status', '1')
        ->get();

        return view('admin.articles.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //

        $request->merge([
            'user_id' => Auth::user()->id
        ]);

        $article = $request->all();

        if ($request->hasFile('image')){
            $article['image'] = $request->file('image')->store('articles');
        }

        Articles::create($article);

        return redirect()->action(ArticleController::class, 'index')
        ->with('success-create', 'Articulo creado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Articles $articles)
    {
        //


        $comments = $articles->comments()->simplePaginate(5);


        return view('subscriber.articles.show' , compact('articles', 'comments'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $articles)
    {
        //
        $categories = Categories::select('id', 'name')
        ->where('status', '1')
        ->get();
        

        return view('admin.articles.edit', compact('categories', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Articles $articles)
    {
        //
        if ($request->hasFile('image')){
            File::delete(public_path('storage/articles') . $articles->image());
            $articles['image'] = $request->file('image')->store('articles');
        }

        $articles->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'introduction' => $request->introduction,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);
        
        
        return redirect()->action(ArticleController::class, 'index')
        ->with('success-update', 'Articulo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $articles)
    {
        //

        if($articles->image){

            File::delete(public_path('storage/') . $articles->image);

        }

        $articles->delete();

        return redirect()->action(ArticleController::class, 'index')
        ->with('success-delete', 'Articulo eliminado con exito');

    }
}
