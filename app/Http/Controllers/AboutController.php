<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param About $about
     * @return JsonResponse
     */
    public function show(About $about): JsonResponse
    {
        return response()->json($about, Response::HTTP_OK);
    }
}
