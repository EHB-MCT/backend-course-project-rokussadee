<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\FormResult;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
class FormController extends Controller
{
    public function getIndex() {
        if(Auth::user()->hasRole('User')) {
            $forms = FeedbackForm::class::where('user_id', '=', Auth::id())->get();
        }
        if(Auth::user()->hasRole('Super Admin')) {
            $forms = FeedbackForm::class::all();
        }

        return view('content.forms.index', ['forms'=>$forms]);
    }

    public function getForm($slug, $sessionid)
    {
        $session = Session::class::where('id', '=', $sessionid)->first();
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
            $questions = $form->questions;
//            dd($form);
        return view('content.forms.form', ['form'=>$form, 'session'=>$session, 'questions' => $questions]);
    }

    public function getFormResult($id)
    {
        $formresult = FormResult::class::where('id', '=', $id)->first();
        $session = Session::class::where('id', '=', $formresult->session_id)->first();
        $form = FeedbackForm::class::where('id', '=', $formresult->feedback_form_id)->first();
        $questions = $form->questions;

        return view('content.forms.formresult', ['form' =>$form,'formresult' => $formresult, 'session' => $session, 'questions' => $questions]);
    }

    public function creator()
    {
        $id = Auth::id();

        return view('content.forms.create', ['id'=>$id]);
    }

    public function postForm(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'description' => 'required|max:500',
            'user_id' => 'required'
        ]);
        $form = new FeedbackForm([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'slug' => Str::slug($request->input('title'))
        ]);

        $form->save();

        return redirect()->route('content.editform', array(Str::slug($request->input('title'))));
    }

    public function editForm($slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
        if (Auth::user()->hasRole('User') && $form->user->id != Auth::id()) {
            abort(403);
        } else {
            $questions = $form->questions;
            return view('content.forms.edit', ['form' => $form, 'questions' => $questions]);
        }
    }

    public function updateDescription(Request $request, $slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();

        if (Auth::user()->hasRole('User') && $form->user->id != Auth::id()) {
            abort(403);
        } else {
            $this->validate($request, [
                'description' => 'required|max:500'
            ]);
            $form->update([
                'description' => $request->description
            ]);

            return Redirect::back()->with('message', 'The forms description has been updated.');
        }
    }

    public function saveFormResult(Request $request, $slug, $respondent, $sessionid)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
        $session = Session::class::where('id', '=', $sessionid)->first();

        $data = $request->except(['_token', '_method']);

//        dd($data);

        $formresult = new FormResult([
           'respondent' => $respondent,
            'slug' => $slug . $sessionid,
            'answers' => json_encode($data),
            'feedback_form_id' => $form->id,
            'user_id' => $form->user_id,
            'session_id' => $sessionid
        ]);

        $formresult->save();

        return redirect()->route('sessions.sessionaccess', ['session' => $session]);
    }

    public function adminDashboard() {
        $forms = FeedbackForm::class::all();
    }
}
