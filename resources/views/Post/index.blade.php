@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-end">
    <a href="{{ route('post.create') }}" class="btn btn-info">發文</a>
</div>

<div class="container-fluid mt-2">
    <div class="d-flex justify-content-center row">
        @foreach($post as $key => $post)
        <div class="card col-3 m-3">
            <img class="card-img-top mt-2" src="https://placedog.net/500/300/?random&_={{ rand(1,9999) }}">
            <div class="card-body">
                <h5 class="card-title">{{ $post -> title }}</h5>
                <p class="card-text">{{ strlen($post -> content)<30 ? $post->content : substr($post->content,0,30)."..." }}</p>
            </div>
            <div class="card-footer bg-transparent border-second text-muted d-flex justify-content-between align-items-center">
                <div>
                    {{ $post->user_id }} <br>
                    {{ substr($post -> created_at,0,10) }}
                </div>
                <a href="{{route('post.show', $post->id)}}" class="btn btn-outline-info btn-sm">詳細</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection