@extends('layouts.base')


@section('content')
    
<div class="card">
    <div class="card-body">
        <p>{{$User->full_name}}</p>

        <h5>Roles</h5>
        <form action="{{route('users.update', $User->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                @foreach ($roles as $role)

                    <label for="">{{$role->name}}</label>
                    <input type="radio" name="role" id="role" value="{{$role->id}}" {{$User->roles->contains($role->id) ? 'checked' : ''}} class="mr-1 mb-3">
               
         
            @endforeach
        </div>
            <input type="submit" value="Establecer rol" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection


