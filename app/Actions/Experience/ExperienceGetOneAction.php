<?php

namespace App\Actions\Experience;

use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Lorisleiva\Actions\Concerns\AsAction;

class ExperienceGetOneAction
{
    use AsAction;

    public function handle(int $id)
    {
        $resume = $this->getData($id);

        return new ExperienceResource($resume);
    }

    private function getData(int $id): Experience
    {
        return Experience::findOrFail($id);
    }
}
