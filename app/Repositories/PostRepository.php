<?php

namespace App\Repositories;

use App\Entities\Post;

class PostRepository
{
    public function index(){
        return Post::with('user')->join('users','posts.user_id','users.id')->select('posts.*','users.name')->get();
    }

    public function find($id){
        return Post::with('user')->find($id);
    }

    public function create(array $data){
        return auth()->user()->post()->create($data);

    }

    public function update($id, array $data){
        $post = Post::find($id);
        return $post ? $post->update($data) : false;
    }

    public function delete($id){
        return Post::destroy($id);
    }
}