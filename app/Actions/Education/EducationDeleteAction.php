<?php

namespace App\Actions\Education;

use App\Models\Education;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class EducationDeleteAction
{
    use AsAction;

    public function handle(int $id)
    {
        DB::transaction(function () use ($id) {
            $experience = Education::findOrFail($id);
            $experience->delete();
        });
    }
}
