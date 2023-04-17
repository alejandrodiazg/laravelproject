<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Symfony\Component\VarDumper\VarDumper;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:comments.index')->only('index');
        $this->middleware('can:comments.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comments = DB::table('comments')
        ->join('articles', 'comments.articles_id', '=', 'articles.id')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.id','comments.value', 'comments.description', 'users.full_name', 'articles.title')
        ->where('users.id', Auth::user()->id)
        ->orderBy('articles.id', 'desc')
        ->get();
    
        // var_dump($comments);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        //


        $result = Comment::where('user_id', Auth::user()->id)
        ->where('articles_id', $request->articles_id)->exists();

        

        $article = Articles::select('status', 'slug')->find($request->articles_id);

        if($result == false and $article->status == 1){
            Comment::create([

               'value' => $request->value,
               'description' => $request->description,
               'user_id' => Auth::user()->id,
               'articles_id' => $request->articles_id, 

            ]);
            return redirect()->action([ArticleController::class, 'show'], [$article->slug]);
        }
        else{
            return redirect()->action([ArticleController::class, 'show'], [$article->slug])
            ->with('success-error', 'Solo puedes comentar una vez');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $Comment)
    {
        //
        $Comment->delete();
        return redirect()->action([CommentController::class, 'index'])->with('success-delete', 'Se ha eliminado el comentario');
    }
}
