<?php

namespace App\Http\Controllers;

use App\Actions\Resume\ResumeGetAllAction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $resumes = ResumeGetAllAction::run($request, 12);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }

        return view('dashboard', compact('resumes'));
    }
}
