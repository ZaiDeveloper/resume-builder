<?php

namespace App\Actions\Experience;

use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class ExperienceDeleteAction
{
    use AsAction;

    public function handle(int $id)
    {
        DB::transaction(function () use ($id) {
            $experience = Experience::findOrFail($id);
            $experience->delete();
        });
    }
}
