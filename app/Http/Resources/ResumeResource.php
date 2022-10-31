<?php

namespace App\Http\Resources;

use App\Support\Facades\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
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
            'title' => $this->title,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'template' => $this->template,
            'template_description' => $this->template->description ?? null,
            'status' => $this->status,
            'status_description' => $this->status->description ?? null,
            'avatar' => $this->avatar ? Helper::showImage($this->avatar) : null,
            'user_id' => $this->user_id,
            'user' => [
                'name' => $this->user->name ?? null,
            ],
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
