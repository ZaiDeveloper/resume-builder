<?php

namespace App\Actions\Experience;

use App\DTO\Experience\{ExperienceStoreDTO};
use App\Enums\Experience\ExperienceCurrentlyWorking;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ExperienceStoreAction
{
    use AsAction;

    public function handle(ExperienceStoreDTO $request)
    {
        return DB::transaction(function () use ($request) {
            return $this->create($request);
        });
    }

    private function create(ExperienceStoreDTO $request): Experience
    {
        return Experience::create(array_merge(
            collect($request->all())->except('currently_working', 'end_month', 'end_year')->toArray(),
            [
                'currently_working' => $request->currently_working ?? ExperienceCurrentlyWorking::No,
                'end_month' => $request->currently_working ? null : $request->end_month,
                'end_year' => $request->currently_working ? null : $request->end_year,
            ]
        ));
    }
}
