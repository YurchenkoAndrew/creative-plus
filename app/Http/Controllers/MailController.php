<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendMessage(EmailRequest $request): JsonResponse
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;
        Mail::to('info@creative-plus.kz')->send(new \App\Mail\Mail($name, $email, $phone, $message));
        return response()->json('message-send', Response::HTTP_OK);
    }
}
