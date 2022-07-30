<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
//    Based on following code:
//    https://www.itsolutionstuff.com/post/laravel-9-mail-laravel-9-send-email-tutorialexample.html

    public function newsession($url, $respondent) {
        $mailData = [
            'title' => 'New session',
            'body' => 'A new session for respondent ' . $respondent . ' has been created. Visit it by clicking the following link: ' . $url
        ];

        Mail::to($respondent)->send(new DemoMail($mailData));
    }

    public function newresult($url, $respondent, $usermail)
    {
        $mailData = [
            'title' => 'New result',
            'body' => 'A new result by respondent ' . $respondent . ' is now available. Visit it by clicking the following link: ' . $url
        ];

        Mail::to($usermail)->send(new DemoMail(($mailData)));
    }
}
