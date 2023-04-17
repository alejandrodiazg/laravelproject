<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.create')->only('create', 'store');
        $this->middleware('can:categories.edit')->only('edit', 'update');
        $this->middleware('can:categories.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories = Categories::orderBy('id', 'desc')
        ->simplePaginate(8);

        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //

        $category = $request->all();

        if ($request->hasFile('image')){
            $category['image'] = $request->file('image')->store('categories');
        }
       

        Categories::create($category);

        return redirect()->action([CategoryController::class, 'index'])
        ->with('succes-create', 'Ha creado la categoria con exito');

    }

    /**
     * Display the specified resource.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Categories $categories)
    {
        //
        
        if ($request->hasFile('image')){
            File::delete(public_path('storage/' . $categories->image));
            $categories['image'] = $request->file('image')->store('categories');
        }
    
        $categories->update([
   
   
           'name' => $request->name,
           'slug' => $request->slug,
           'is_featured' => $request->is_featured,
           'status' => $request->status,     
        ]);
   
        return redirect()->action([CategoryController::class, 'index'])
        ->with('success-create', 'categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
        if($categories->image){
            File::delete(public_path('storage/' . $categories->image));
        }
            $categories->delete();
            
            return redirect()->action([CategoryController::class, 'index'])
            ->with('success-delete', 'categoria eliminada con exito');
       
    }

    public function detail(Categories $categories){

        $this->authorize('published',  $categories);

        $articles = Articles::where([
            ['category_id', $categories->id],
            ['status', '1']
        ])
    ->orderBy('id', 'desc')
    ->simplePaginate(5)
    ;

    
    $navbar = Categories::where([[
        'status', '1'
    ], ['is_featured', '1']])
    -> SimplePaginate(3);

    return view('subscriber.categories.detail', compact('categories', 'articles', 'navbar'));
    }

}
