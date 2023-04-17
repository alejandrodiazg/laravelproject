@extends('adminlte::page')

@section('title', 'Panel de administración')

@section('content_header')
    <h1>Modificar Rol</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('roles.update', $role->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="name" name='name'
                        placeholder="{{$role->name}}" value="">

                @error('name')
                <span class="alert-red">
                    <span>*{{ $message }}</span>
                </span>
                @enderror

            </div>
            <h3>Lista de permisos</h3>

            @foreach ($permissions as $permission)
                
            <div>
                <label>
                    {{$permission->name}}
                    <input type="checkbox" name="{{$permission->name}}" id="{{$permission->id}}" {{$permission->roles->contains($role->id) ? 'checked' : '' }} value="{{$permission->id}}" 
                    class="mr-1">
                   
                </label>
            </div>
            @endforeach

            <input type="submit" value="Modificar rol" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection
