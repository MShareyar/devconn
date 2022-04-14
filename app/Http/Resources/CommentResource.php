<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id' => $this->id,
            'commenter_id' => $this->commenter_id,
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('m/d/Y'),
            'commenter_name' => $this->commenter->name,
            'can_edit' => $this->commenter_id == auth()->id(),
            'can_delete' => $this->commenter_id == auth()->id()
        ];
    }
}
