<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Story extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'likes' => $this->likes,
            'status' => $this->status,
            'category' => $this->category->name,
            'author' => $this->author->name

        ];
    }
}
