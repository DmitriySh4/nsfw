<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactsMail;

class ContactController extends Controller
{
    public function submit(ContactRequest $data) {
        Mail::to('nsfw@outsourcing.com')->send(new ContactsMail($data->name, $data->email, $data->text));

    	return back()->with('contactsent', 'Message was sent successfully');
    }
}
