@extends('layouts.app')
@section('content')
<style>
    textarea {
        resize:none;
        }
</style>
<script>
    function autogrow(textarea){
        var adjustedHeight = textarea.clientHeight;
        adjustedHeight = Math.max(textarea.scrollHeight,adjustedHeight);
        if (adjustedHeight>textarea.clientHeight){
            textarea.style.height=adjustedHeight+'px';
        }
    }
</script>
    <div class="container w-100">
        <form action="{{ route('post.update',$post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="col-form-label">標題</label>
                <div>
                    <input type="text" class="form-control" id="title" name="title" value={{$post->title}}>
                </div>
            </div>

            <div class="form-group">
                <label for="content" class="col-form-label">內容</label>
                <div>
                    <textarea name="content" id="content" class="w-100" style="height:10rem;" onkeyup="autogrow(this)">{{$post->content}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-outline-info" value="儲存">
            </div>
        </form>

    </div>

@endsection