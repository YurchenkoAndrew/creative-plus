<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ContactController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return JsonResponse
     */
    public function show(Contact $contact): JsonResponse
    {
        return \response()->json($contact, Response::HTTP_OK);
    }
}
