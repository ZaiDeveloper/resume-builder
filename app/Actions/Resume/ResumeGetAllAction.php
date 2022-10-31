<?php

namespace App\Actions\Resume;

use App\Http\Resources\ResumeCollection;
use App\Models\Resume;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeGetAllAction
{
    use AsAction;

    public function handle(Request $request, int $pageSize)
    {
        $resumes = Resume::filter($request->toArray())->latest()->paginate($pageSize);
        return new ResumeCollection($resumes);
    }
}
