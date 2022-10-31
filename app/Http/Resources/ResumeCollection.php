<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResumeCollection extends ResourceCollection
{
    private $hasPagination;

    public function __construct($resource, $hasPagination = true)
    {
        parent::__construct($resource);

        $this->hasPagination = $hasPagination;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->hasPagination) {
            return [
                'records' => $this->collection,
                'pagination' => [
                    'current_page' => $this->currentPage(),
                    'last_page' => $this->lastPage(),
                    'total_record' => $this->total(),
                    'page_size' => $this->perPage(),
                    'has_more_page' => $this->hasMorePages(),
                ],
            ];
        } else {
            return parent::toArray($request);
        }
    }
}
