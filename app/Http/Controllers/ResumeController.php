<?php

namespace App\Http\Controllers;

use App\Actions\Resume\{ResumeDeleteAction, ResumeGetOneAction, ResumeGetOneByCodeAction, ResumeStoreAction, ResumeUpdateAction};
use App\DTO\Resume\{ResumeUpdateDTO, ResumeStoreDTO};
use App\Enums\Resume\{ResumeTemplate, ResumeStatus};
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, int $id)
    {
        try {
            $resume = ResumeGetOneAction::run($id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return view('resume.index', compact('resume'));
    }

    public function create()
    {
        $statuses = array_flip(ResumeStatus::asArray());
        $templates = array_flip(ResumeTemplate::asArray());

        return view('resume.create', compact('statuses', 'templates'));
    }

    public function store(ResumeStoreDTO $request)
    {
        try {
            $resume = ResumeStoreAction::run($request);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return redirect()->intended('resume/' . $resume->id)->withSuccess('Successfully created.');
    }

    public function edit(int $id)
    {
        try {
            $resume = ResumeGetOneAction::run($id);
            $statuses = array_flip(ResumeStatus::asArray());
            $templates = array_flip(ResumeTemplate::asArray());
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return view('resume.edit', compact('resume', 'statuses', 'templates'));
    }

    public function update(ResumeUpdateDTO $request, int $id)
    {
        try {
            $resume = ResumeUpdateAction::run($request, $id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return redirect()->intended('resume/' . $resume->id)->withSuccess('Successfully updated.');
    }

    public function delete(int $id)
    {
        try {
            ResumeDeleteAction::run($id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return redirect()->intended('dashboard')->withSuccess('Successfully deleted.');
    }

    public function uniqueCode(string $code)
    {
        try {
            $resume = ResumeGetOneByCodeAction::run($code);
            if ($resume->status == ResumeStatus::Unpublish()) return redirect()->intended('dashboard')->withError('Resume not publish.');;
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return view('resume-template.' . $resume->template->value, compact('resume'));
    }
}
