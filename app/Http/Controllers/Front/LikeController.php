<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\AddRemoveLikePostRequest;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRemoveLikePostRequest $request)
    {
        $post = Post::find($request->post_id);

        if(!$post){
            return redirect()->back()->with('error','No record found!');
        }

        if($post->liked()){
            $post->unlike();
        }else{
            $post->like();        
        }

        return new PostResource($post);
    }


}
