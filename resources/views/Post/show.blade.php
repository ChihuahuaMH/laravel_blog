@extends('layouts.app') 

@section('content')
<style>
    pre{
        margin:0;
        padding:0;
        white-space: pre-line;
    }
</style>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
})
</script>
<div class="container">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('post.index')}}">BLOG</a></li>
            <li class="breadcrumb-item"><a href="#">{{$post -> user['name']}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
        </ol>
    </nav>
        
    <div class="card">
        <div class="card-header">
            <h2>{{$post -> title}}</h2>
            <div class="card-subtitle text-muted">
                {{$post -> created_at}}
            </div>
        </div>
        <div class="card-body" style="font-size:1.25rem;">
            <pre>
                {{$post -> content}}
            </pre>
        </div>
        <div class="card-footer bg-transparent border-light">
            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-outline-info">編輯</a>
            <input type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal" value="刪除">
        </div>
    </div>
    <div class="mt-4">
        留言回覆
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">刪除</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            確定刪除本篇文章嗎？
        </div>
        <div class="modal-footer">
            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">刪除</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        </div>
        </div>
    </div>
    </div>
@endsection