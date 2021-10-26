<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentRelationshipResource extends JsonResource
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
            'author'   => [
                'data'  => new AuthorIdentifierResource($this->author),
            ],
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('comments.index'),
            ],
        ];
    }
}
