@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
<h2>Administra tus artículos</h2>
@endsection

@section('content')

@if (Session::has('success-create'))
    <div class="alert alert-success">
        <ul>
            <li>{!!Session::get('success-create')!!}</li>
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('articles.create')}}">Crear artículo</a>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($articles as $article)
                    
               
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->categories->name}}</td>
                    <td>
                        <input type="checkbox" name="status" id="status" class="form-check-input ml-4"
                        {{$article->status === true ? 'checked=checked' : 'checked=""' }}
                        disabled>
                    </td>

                    <td width="2px"><a href="{{route('articles.show', $article->slug)}}"
                            class="btn btn-primary btn-sm mb-2">Mostrar</a></td>

                    <td width="5px"><a href="{{route('articles.edit', $article->slug)}}"
                            class="btn btn-primary btn-sm mb-2">Editar</a></td>

                    <td width="5px">
                        <form action="#" method="POST">
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        <div class="text-center mt-3">
            {{$articles->links()}}
        </div>
    </div>
</div>

@endsection