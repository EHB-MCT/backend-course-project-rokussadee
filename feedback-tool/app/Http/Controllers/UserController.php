<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getIndex() {
        if(Auth::user()->hasRole('Super Admin')) {
            $users = User::class::all();
            return view('admin.users', ['users'=>$users]);
        } else {
            abort(403);
        }
    }
}
