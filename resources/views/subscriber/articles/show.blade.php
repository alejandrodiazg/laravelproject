@extends('layouts.base')

@section('styles')

<link rel="stylesheet" href="{{asset('css/manage_post/post/css/article_show.css')}}">
<link rel="stylesheet" href="{{asset('css/manage_post/comments/css/comments.css')}}">
@endsection

@section('title')
<title>Articulo</title>
@endsection
    
@section('content')
    
<div class="content-post">

    <div class="post-title line">
        <h2 class="fw-bold">{{$articles->title}}</h2>
    </div>

    <div class="post-introduction line">
        <p>{!! $articles->introduction !!}</p>
    </div>

    <div class="post-author line">
        <img src="{{$articles->user->profile->photos ? asset('storage/' . $articles->user->profile->photos) : asset('img/user-default.png')}}" class="img-author">

        <span>Autor:
            <a href="#">{{$articles->user->full_name}}</a>
        </span>
    </div>

    <hr>

    <div class="post-image">
        <img src="{{asset('storage/' . $articles->image)}}" alt="imagen" class="post-image-img">
    </div>

    <div class="post-body line">{!! $articles->body !!}</div>
    <hr>
</div>

<div class="text-primary">
    <h2>Comentarios</h2>

    @if (Auth::check())
        @include('subscriber.comments.create')
    @else
    <p class="alert-post">Para comentar debe iniciar sesión</p>
    @endif
</div>
@if (session('success-error'))
<div class="text-danger text-center">
    <p>{{session('success-error')}}</p>
</div>
@endif


@include('subscriber.comments.show')

@endsection