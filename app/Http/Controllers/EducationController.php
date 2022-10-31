<?php

namespace App\Http\Controllers;

use App\Actions\Education\{EducationDeleteAction, EducationGetOneAction, EducationStoreAction, EducationUpdateAction};
use App\Actions\Resume\{ResumeGetOneAction};
use App\DTO\Education\{EducationStoreDTO, EducationUpdateDTO};

class EducationController extends Controller
{
    public function create(int $id)
    {
        $resume = ResumeGetOneAction::run($id);

        return view('education.create', compact('resume'));
    }

    public function store(EducationStoreDTO $request)
    {
        try {
            $education = EducationStoreAction::run($request);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return redirect()->intended('resume/' . $education->resume_id)->withSuccess('Successfully created.');
    }

    public function edit(int $id)
    {
        try {
            $education = EducationGetOneAction::run($id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return view('education.edit', compact('education'));
    }

    public function update(EducationUpdateDTO $request, int $id)
    {
        try {
            $education = EducationUpdateAction::run($request, $id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return redirect()->intended('resume/' . $education->resume_id)->withSuccess('Successfully updated.');
    }

    public function delete(int $id)
    {
        try {
            $education = EducationGetOneAction::run($id);
            EducationDeleteAction::run($id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return redirect()->intended('resume/' . $education->resume_id)->withSuccess('Successfully deleted.');
    }
}
