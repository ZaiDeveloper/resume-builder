<?php

namespace App\Actions\Education;

use App\DTO\Education\{EducationUpdateDTO};
use App\Models\Education;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class EducationUpdateAction
{
    use AsAction;

    public function handle(EducationUpdateDTO $request, int $id)
    {

        return DB::transaction(function () use ($request, $id) {
            return $this->update($request, $id);
        });
    }

    private function update(EducationUpdateDTO $request, int $id): Education
    {
        return Education::updateOrCreate(
            [
                'id' => $id
            ],
            collect($request->all())->toArray()
        );
    }
}
