<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //'title','slug','body'
        //return parent::toArray($request);
        return [
            'title'         => $this->title,
            'path'          => $this->path,
            'slug'          => $this->slug,
            'body'          => $this->body,
            'created_on'    => $this->created_at->diffForHumans(),
            'user'          => $this->user->name
        ];
    }
}
