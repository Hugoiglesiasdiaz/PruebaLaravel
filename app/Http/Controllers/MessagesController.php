<?php

namespace App\Http\Controllers;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store()
    {
        $msg = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ],[
            'name.required' => 'Necesito tu nombre',
        ]);

        Mail::to('hugoiglesiasdiaz1@gmail.com')->queue(new MessageReceived($msg));

        return 'Datos Procesados';
    }
}