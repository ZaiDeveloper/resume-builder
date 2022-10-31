<?php

namespace App\Actions\Resume;

use App\Http\Resources\ResumeResource;
use App\Models\Resume;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeGetOneByCodeAction
{
    use AsAction;

    public function handle(string $code)
    {
        $resume = $this->getData($code);

        return new ResumeResource($resume);
    }

    private function getData(string $code): Resume
    {
        return Resume::where(['unique_link' => $code])->firstOrFail();
    }
}
