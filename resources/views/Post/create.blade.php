@extends('layouts.app')
@section('content')
<style>
    textarea {
        resize: none;
    }
</style>
<script>
    function autogrow(textarea) {
        var adjustedHeight = textarea.clientHeight;
        adjustedHeight = Math.max(textarea.scrollHeight, adjustedHeight);
        if (adjustedHeight > textarea.clientHeight) {
            textarea.style.height = adjustedHeight + 'px';
        }
    }
</script>

<div class="container w-100">
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            {{date('Y / m / d')}}
        </div>

        <div class="form-group">
            <label for="title" class="col-form-label">標題</label>
            <div>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="col-form-label">內容</label>
            <div>
                <textarea name="content" id="content" class="w-100" style="height:10rem;"
                    onkeyup="autogrow(this)" required></textarea>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-info" value="發表">
        </div>
    </form>
</div>
@endsection