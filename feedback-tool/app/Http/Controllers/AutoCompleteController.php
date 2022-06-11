<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoCompleteController extends Controller
{
    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function selectSearch(Request $request)
    {
        $categories = [];

        if($request->has('q')){
            $search = $request->q;
            $categories = Category::select("title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($categories);
    }
}
