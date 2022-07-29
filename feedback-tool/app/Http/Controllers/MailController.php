<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($url, $respondent) {
        $mailData = [
            'title' => 'Session created',
            'body' => 'A new session has been created for you. Visit it by clicking the following link: ' . $url
        ];

        Mail::to($respondent)->send(new DemoMail($mailData));

    }
}
