<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'user'              => $this->user->name,
            'created on'        => $this->created_at->diffForHumans(),
        ];
    }
}