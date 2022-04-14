<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'content'    => $this->content,
            'created_at' => $this->created_at->format('m/d/Y'),
            'user_id'    => $this->user_id,
            'created_by' => $this->user->name,
            'comments'   => CommentResource::collection($this->comments) ?? [],
            'total_comments' => $this->comments->count(),
            'can_delete' => $this->user_id == auth()->id(),
            'liked'      => $this->liked(),
            'likes_count'=> $this->likeCount,
        ];
    }
}
