@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {!! Session::get('status') !!}
                        </div>
                    @endif
                    
                    @if (Session::has('success-update'))
    <div class="alert alert-success">
        <ul>
            <li>{!!Session::get('success-update')!!}</li>
        </ul>
    </div>
@endif

                    

                    

                    {{ __('You are logged in!') }}
                </div>
            </div>
            @foreach ($articles as $article)
            {{var_dump($article->title)}}
            @endforeach
            
        </div>
    </div>
</div>
@endsection
