<?php

namespace App\Actions\Resume;

use App\Models\Resume;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeDeleteAction
{
    use AsAction, FileUpload;

    public function handle(int $id)
    {
        DB::transaction(function () use ($id) {
            $resume = Resume::findOrFail($id);
            $this->delete($resume);
        });
    }

    private function delete(Resume $resume): void
    {
        if ($resume->experiences()) $resume->experiences->each->delete();
        if ($resume->educations()) $resume->educations->each->delete();

        if ($resume) {
            $this->deleteUploadImage($resume->avatar);
            $resume->delete();
        }
    }
}
