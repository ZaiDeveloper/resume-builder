<?php

namespace App\Actions\Resume;

use App\Http\Resources\ResumeResource;
use App\Models\Resume;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeGetOneAction
{
    use AsAction;

    public function handle(int $id)
    {
        $resume = $this->getData($id);

        return new ResumeResource($resume);
    }

    private function getData(int $id): Resume
    {
        return Resume::findOrFail($id);
    }
}
