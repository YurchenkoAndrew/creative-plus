<?php

namespace App\Http\Controllers;

use App\Models\ExecutionScheme;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ExecutionSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(ExecutionScheme::all(), Response::HTTP_OK);
    }
}
