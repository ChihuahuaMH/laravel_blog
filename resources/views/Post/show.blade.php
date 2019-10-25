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
    <!-- 麵包屑導覽 -->
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('post.index')}}">BLOG</a></li>
            <li class="breadcrumb-item"><a href="#">{{$post -> user['name']}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
        </ol>
    </nav>
    
    <!-- 文章內容 -->
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

        <!-- 如果是自己發文才能修改刪除文章 -->
        @if(Auth::user()->id == $post->user_id)
            <div class="card-footer bg-transparent border-light">
                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-outline-info">編輯</a>
                <input type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal" value="刪除">
            </div>
        @endif
    </div>

    <!-- 留言區 -->
    <div class="mt-4">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#msg" role="tab">留言區</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#leavemsg" role="tab">我要留言</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane p-2 active" id="msg" role="tabpanel">目前暫無留言！</div>
            <div class="tab-pane p-2" id="leavemsg" role="tabpanel">
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">帳號</span>
                    </div>
                    <input type="text" class="form-control w-50" value="{{Auth::user()->name}}" disabled>
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">標題</span>
                    </div>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">內容</span>
                    </div>
                    <textarea class="form-control"></textarea>
                </div>
                <input type="button" class="btn btn-sm btn-outline-info mt-2" value="送出">
            </div>
        </div>
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