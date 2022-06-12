<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FeedbackForm;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function postQuestion(Request $request, $id)
    {
//        dd($request);
        $array = [];
        for ($i = 1; $i <= $request->input('optionCount'); $i++) {
            array_push($array, $i);
        }
//        dd($array);
        $question = Question::class::create([
            'title' => $request->input('title'),
            'options' => json_encode($array),
            'slug' => Str::slug($request->input('title')),
            'user_id' => $request->input('user_id')
        ]);
//        dd($question);
        $categories = $request->get('livesearch');
        foreach ($categories as $category) {
            $dbCategory = Category::class::where('title', '=', $category)->first();
//            dd($dbCategory);
            $question->categories()->attach($dbCategory);
        }

        $form = FeedbackForm::class::where('id' ,'=', $id)->first();
        $form->questions()->attach($question);


        return Redirect::back()->with('message', 'A new question has been added to this form.');
    }

    public function update(Request $request, $id)
    {
//        $validator = Validator::make($request->all(), [
//           ""
//        ]);
//        dd($request->title);
        Question::class::where('id', '=', $id)->update([
            'title' => $request->title
        ]);

        return Redirect::back()->with('message', 'Question with id' . $id . 'has been updated.');
    }
}
