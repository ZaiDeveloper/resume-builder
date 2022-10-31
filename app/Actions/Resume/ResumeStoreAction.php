<?php

namespace App\Actions\Resume;

use App\DTO\Resume\ResumeStoreDTO;
use App\Models\Resume;
use App\Support\Facades\Helper;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeStoreAction
{
    use AsAction, FileUpload;

    public function handle(ResumeStoreDTO $request)
    {
        return DB::transaction(function () use ($request) {
            return $this->create($request);
        });
    }

    private function create(ResumeStoreDTO $request): Resume
    {
        return Resume::create(array_merge(
            collect($request->all())->except('avatar', 'unique_link')->toArray(),
            [
                'unique_link' => Helper::randomString(8),
                'user_id' => Auth::id(),
                'avatar' => $this->uploadImageWithResize($request->avatar, 'avatar-img', [700, 700]),
            ]
        ));
    }
}
