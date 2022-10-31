<?php

namespace App\Actions\Experience;

use App\DTO\Experience\{ExperienceUpdateDTO};
use App\Enums\Experience\ExperienceCurrentlyWorking;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ExperienceUpdateAction
{
    use AsAction;

    public function handle(ExperienceUpdateDTO $request, int $id)
    {

        return DB::transaction(function () use ($request, $id) {
            return $this->update($request, $id);
        });
    }

    private function update(ExperienceUpdateDTO $request, int $id): Experience
    {
        return Experience::updateOrCreate(
            [
                'id' => $id
            ],
            array_merge(
                collect($request->all())->except('currently_working', 'end_month', 'end_year')->toArray(),
                [
                    'currently_working' => $request->currently_working ?? ExperienceCurrentlyWorking::No,
                    'end_month' => $request->currently_working ? null : $request->end_month,
                    'end_year' => $request->currently_working ? null : $request->end_year,
                ]
            )
        );
    }
}
