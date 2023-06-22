<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function sendTestEmail()
    {
        Mail::raw('Testing email sending', function ($message) {
            $message->to('noura.boudra3@gmail.com')
                ->subject('Test Email');
        });

        return 'Test email sent.';
    }
}
