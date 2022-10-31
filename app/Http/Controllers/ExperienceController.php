<?php

namespace App\Http\Controllers;

use App\Actions\Experience\{ExperienceDeleteAction, ExperienceGetOneAction, ExperienceStoreAction, ExperienceUpdateAction};
use App\Actions\Resume\{ResumeGetOneAction};
use App\DTO\Experience\{ExperienceStoreDTO, ExperienceUpdateDTO};
use App\Enums\Experience\{ExperienceCurrentlyWorking, ExperienceEmploymentType};

class ExperienceController extends Controller
{
    public function create(int $id)
    {
        $resume = ResumeGetOneAction::run($id);
        $employmentTypes = array_flip(ExperienceEmploymentType::asArray());
        $currentlyWorks = array_flip(ExperienceCurrentlyWorking::asArray());

        return view('experience.create', compact('employmentTypes', 'currentlyWorks', 'resume'));
    }

    public function store(ExperienceStoreDTO $request)
    {
        try {
            $experience = ExperienceStoreAction::run($request);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return redirect()->intended('resume/' . $experience->resume_id)->withSuccess('Successfully created.');
    }

    public function edit(int $id)
    {
        try {
            $experience = ExperienceGetOneAction::run($id);
            $employmentTypes = array_flip(ExperienceEmploymentType::asArray());
            $currentlyWorks = array_flip(ExperienceCurrentlyWorking::asArray());
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return view('experience.edit', compact('experience', 'employmentTypes', 'currentlyWorks'));
    }

    public function update(ExperienceUpdateDTO $request, int $id)
    {
        try {
            $experience = ExperienceUpdateAction::run($request, $id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return redirect()->intended('resume/' . $experience->resume_id)->withSuccess('Successfully updated.');
    }

    public function delete(int $id)
    {
        try {
            $experience = ExperienceGetOneAction::run($id);
            ExperienceDeleteAction::run($id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return redirect()->intended('resume/' . $experience->resume_id)->withSuccess('Successfully deleted.');
    }
}
