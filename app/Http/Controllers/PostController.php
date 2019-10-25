<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $postRepo;

    // protected定義$postRepo的屬性，讓 controller 透過該屬性調用PostRepository
    public function __construct(PostRepository $postRepo){
        $this -> postRepo = $postRepo;
    }

    // 列出所有文章
    public function index(){
        $post = $this->postRepo->index();
        return view('post.index',['post' => $post]);
    }

    // 發表完文章之後顯示
    public function show($id){
        $post = $this->postRepo->find($id);
        return view('post.show',['post'=>$post]); 

    }

    // 發表文章
    public function create(){
        return view('post.create');
    }

    // 儲存文章
    public function store(){
        $post = $this->postRepo->create(request()->only('title','content'));
        // only接收限定參數，避免被攻擊
        if($post){
            return redirect()->route('post.show',$post->id);
        }
        return back();
    }

    // 編輯文章
    public function edit($id){
        $post = $this->postRepo->find($id);

        if(!$post){
            return redirect()->route('post.index');
        }
        return view('post.edit',['post'=>$post]);
    }

    // 更新文章
    public function update($id){
        $result = $this->postRepo->update($id,request()->only('title','content'));

        if(!$result){
            return redirect()->route('post.index');
        }
        return redirect()->route('post.show',$id);
    }

    // 刪除文章
    public function destroy($id){
        $result = $this->postRepo->delete($id);

        if($result){
            return redirect()->route('post.index');
        }
        return back();
    }
}
