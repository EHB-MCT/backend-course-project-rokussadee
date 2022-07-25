<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
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

    public function getForm($slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
            $questions = $form->questions;
//            dd($form);
            return view('content.forms.form', ['form'=>$form, 'questions' => $questions]);
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

        return redirect()->route('content.edit', array(Str::slug($request->input('title'))));
    }

    public function editForm($slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
//        dd($form);
        if (Auth::user()->hasRole('User') && $form->user->id != Auth::id()) {
            abort(403);
        } else {
            $questions = $form->questions;
//            dd($form);
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

    public function saveFormResult(Request $request, $slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
        return view('content.dashboard', ['form' => $form, 'result' => $request->all()]);
    }

    public function adminDashboard() {
        $forms = FeedbackForm::class::all();
    }
}
