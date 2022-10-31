<?php

namespace App\Actions\Education;

use App\DTO\Education\{EducationStoreDTO};
use App\Models\Education;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class EducationStoreAction
{
    use AsAction;

    public function handle(EducationStoreDTO $request)
    {
        return DB::transaction(function () use ($request) {
            return $this->create($request);
        });
    }

    private function create(EducationStoreDTO $request): Education
    {
        return Education::create(collect($request->all())->toArray());
    }
}
