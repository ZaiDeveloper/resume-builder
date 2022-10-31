<?php

namespace App\Actions\Education;

use App\Http\Resources\EducationResource;
use App\Models\Education;
use Lorisleiva\Actions\Concerns\AsAction;

class EducationGetOneAction
{
    use AsAction;

    public function handle(int $id)
    {
        $resume = $this->getData($id);

        return new EducationResource($resume);
    }

    private function getData(int $id): Education
    {
        return Education::findOrFail($id);
    }
}
