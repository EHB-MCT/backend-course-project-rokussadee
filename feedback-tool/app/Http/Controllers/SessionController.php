<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\FormResult;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
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

            return view('content.sessions.session', ['session'=>$session]);
    }

    public function editSession($slug)
    {
        $session = Session::class::where('slug', '=', $slug)->first();
        $formresults = FormResult::class::where([['respondent', '=', $session->respondent], ['feedback_form_id', '=', $form->id]]);

        if (Auth::user()->hasRole('User') && $session->user->id != Auth::id()) {
            abort(403);
        } else {
            return view('content.sessions.session', ['session'=>$session, 'formresults' => $formresults]);
        }
    }

    public function creator()
    {
        $id = Auth::id();

        return view('content.sessions.create', ['id'=>$id]);
    }

    public function postSession(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'respondent' => 'required|email',
            'user_id' => 'required'
        ]);
        $session = new Session([
            'title' => $request->input('title'),
            'respondent' => $request->input('respondent'),
            'started_at' => now(),
            'ended_at' => now(),
            'user_id' => $request->input('user_id'),
            'slug' => Str::slug($request->input('title') . '-' . $request->input('respondent'))
        ]);

        $session->save();

        app('\App\Http\Controllers\MailController')->index(\route('sessions.sessionaccess', array(Str::slug($request->input('title') . '-' . $request->input('respondent')))), $request->input('respondent'));

        return Redirect::route('sessions.editsession', array(Str::slug($request->input('title') . '-' . $request->input('respondent'))));

    }
}
