<?php

namespace App\Actions\Resume;

use App\DTO\Resume\ResumeUpdateDTO;
use App\Models\Resume;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeUpdateAction
{
    use AsAction;

    use AsAction, FileUpload;

    public function handle(ResumeUpdateDTO $request, int $id)
    {
        return DB::transaction(function () use ($request, $id) {
            return $this->update($request, $id);
        });
    }

    private function update(ResumeUpdateDTO $request, int $id): Resume
    {
        $resume = Resume::findOrFail($id);
        if ($request->avatar) {
            if ($resume) {
                $this->deleteUploadImage($resume->avatar);
                $resume->avatar = $this->uploadImageWithResize($request->avatar, 'avatar-img', [700, 700]);
                $resume->save();
            }
        }

        return Resume::updateOrCreate(
            [
                'id' => $id
            ],
            collect($request->all())->except('avatar', 'unique_link')->toArray()
        );
    }
}
