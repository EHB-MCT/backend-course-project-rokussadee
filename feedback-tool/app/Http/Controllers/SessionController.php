<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\FormResult;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function getIndex()
    {
        if(Auth::user()->hasRole('User')) {
            $sessions = Session::class::where('user_id', '=', Auth::id())->get();
        }
        if(Auth::user()->hasRole('Super Admin')) {
            $sessions = Session::class::all();
        }

        return view('content.sessions.index', ['sessions'=>$sessions]);
    }

    public function sessionAccess($slug)
    {
        $session = Session::class::where('slug', '=', $slug)->first();

//        $formresults = FormResult::class::where('respondent', '=', $session->respondent);

//        dd($session->forms->where('respondent'));

//        $form = $session->forms->first();
//
//        dd(FormResult::class::where([['respondent', '=', $session->respondent], ['feedback_form_id', '=', $form->id]])->get()->first()->feedback_form_id );

        return view('content.sessions.session', ['session'=>$session]);
    }
}
