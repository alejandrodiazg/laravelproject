@extends('layouts.base')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/manage_post/categories/css/article_category.css')}}">
   
@endsection

@section('title')
<title>{{$categories->name}}</title>
@endsection



@section('content')

@include('layouts.navbar')
    

<div class="text-primary">
    <h2 class="fw-bold fs-1">{{ strtoupper($categories->name)}}</h2>
</div>

<div class="article-container">
@foreach ($articles as $article)
    <article class="article">
        <img src="{{asset('storage/' . $article->image)}}" class="img">
        <div class="card-body">
            <a href="{{route('articles.show', $article->slug)}}">
                <h2 class="title">{{Str::limit($article->title, 60, '...')}}</h2>
            </a>
            <p class="introduction">{{Str::limit($article->introduction, 120, '...')}}</p>
        </div>
    </article>
    @endforeach

</div>

<div class="links-paginate">
    {{$articles->links()}}
</div>

@endsection