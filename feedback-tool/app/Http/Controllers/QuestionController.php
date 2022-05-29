<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function update(Request $request, $id)
    {
//        $validator = Validator::make($request->all(), [
//           ""
//        ]);
//        dd($request->title);
        Question::where('id', '=', $id)->update([
            "title" => $request->title
        ]);

        return Redirect::back()->with('message', 'Operation Succesful');
    }
}
