<?php

namespace App\Http\Resources;

use App\Models\People;
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => CommentResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $included  = $this->collection->map(
            function ($article) {
                return $article->author;
            }
        )->unique();

        return [
            'links'    => [
                'self' => route('comments.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof People) {
                    return new PeopleResource($include);
                }
            }
        );
    }
}
