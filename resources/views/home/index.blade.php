@extends('layouts.base')

@section('styles')

<link rel="stylesheet" href="{{asset('css/manage_post/categories/css/article_category.css')}}">

@endsection

@section('title')
<title>Blog</title>
@endsection

@section('content')

@include('layouts.navbar')


<div class="slogan">
    <div class="column1">
        <h2>BLOG</h2>
    </div>
    <div class="column2">
        <p>Hemos ayudado a más de 1 millon de personas a crecer 
           profesionalmente. Estos artículos comparten concejos
           para la búsqueda de empleo, la productividad y el éxito 
           laboral en diferentes áreas del conocimiento.</p>
    </div>
</div>

<div class="article-container">

    <!-- Listar artículos -->
    @foreach ($article as $articles)
    <article class="article">
        <img src="{{asset('storage/' . $articles->image)}}" class="img">
        <div class="card-body">
            <a href="{{route('articles.show', $articles->slug)}}">
                <h2 class="title">{{Str::limit($articles->title, 60, '...')}}</h2>
            </a>
            <p class="introduction">{{Str::limit($articles->introduction, 100, '...')}}</p>
        </div>
    </article>
    @endforeach
</div>
<div class="links-paginate">
    {{$article->links()}}
</div>

@endsection