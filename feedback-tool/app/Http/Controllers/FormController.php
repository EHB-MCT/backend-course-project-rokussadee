<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->hasRole('User') && $form->user->id != Auth::id()) {
            abort(403);
        } else {
            $questions = $form->questions;
//            dd($form);
            return view('content.forms.form', ['form'=>$form, 'questions' => $questions]);
        }
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
//        $form->user->attach(Auth::user());
        $form->save();

        return redirect()->route('content.form', array(Str::slug($request->input('title'))));
    }

    public function editForm($slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
//        dd($form);
        if ($form->user->id != Auth::id()) {
            abort(403);
        } else {
            $questions = $form->questions;
            return view('content.forms.edit', ['form'=>$form, 'questions' => $questions]);
        }
    }

    public function adminDashboard() {
        $forms = FeedbackForm::class::all();
    }
}
