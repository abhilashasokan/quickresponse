<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\QuestionResource;
class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'question'          => $this->question->title,
            'reply'             => $this->body,            
            'user_id'           => $this->user_id,
            'question_slug'     => $this->question->slug,
            'user'              => $this->user->name,
            'like_count'        => $this->like->count(),
            'liked'             => !! $this->like->where('user_id', auth()->id())->count(),
            'created_at'        => $this->created_at->diffForHumans(),
        ];
    }
}
