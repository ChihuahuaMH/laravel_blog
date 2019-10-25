@extends('layouts.app')

@section('content')
<script>
    (function(){
        var timeleft = 3;
        var cd = setInterval(function(){
        document.getElementById("cd").innerHTML = timeleft;
        timeleft -= 1;
        if(timeleft <= 0)
            window.location.href = "{{ route('post.index')}}";
        }, 1000);
     })();


</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登入成功！</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    請等待 <span class="text-danger" id="cd" style="font-size:1.5rem">3</span> 秒 自動跳轉 <br>
                    若沒跳轉請點擊 <a href="{{route('post.index')}}">這裡</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
