@extends('layouts.base')

@section('content')
    

<div class="btn-article">
    <a href="{{route('home.index')}}" class="btn-new-article">⬅</a>
</div>

<div class="main-content">
    <div class="title-page-admin">
        <h2>Editar Perfil</h2>
    </div>
    <form method="POST" action="{{route('Profiles.update', $Profile->user->id)}}" enctype="multipart/form-data"
        class="form-article">
        @csrf
        @method('PUT')
        <div class="content-create-article">

            <div class="input-content">
                <label for="name">Nombre completo:</label>
                <input type="text" name="full_name" placeholder="Escribe tu nombre completo"
                    value="{{$Profile->user->full_name}}" autofocus>

                    @error('full_name')
                <span class="text-danger">
                    <span>{{$message}}</span>
                </span>
                @enderror
            </div>

            <div class="input-content">
                <label for="email">Correo eléctronico</label>
                <input type="text" name="email" placeholder="Correo eléctronico" value="{{$Profile->user->email}}"
                    autofocus>

                    @error('email')
                    <span class="text-danger">
                        <span>{{$message}}</span>
                    </span>
                    @enderror

            <div class="input-content">
                <label for="image">Foto de perfil</label> <br>
                <input type="file" id="photos" accept="image/*" name="photos" class="form-input-file">

                <label>Foto actual</label>
                <div class="img-article">
                    <img src="{{$Profile->photos}}" class="img">
                </div>

                @error('photos')
                <span class="text-danger">
                    <span>{{$message}}</span>
                </span>
                @enderror

            </div>

            <input type="submit" value="Editar perfil" class="button">
    </form>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('../css/user/profiles/css/article_profile.css')}}">
<link rel="stylesheet" href="{{asset('../css/user/profiles/css/style_profile.css')}}">
@endsection