<?php

namespace App\Http\Controllers;

use App\Models\OurAdvantage;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OurAdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(OurAdvantage::all(), Response::HTTP_OK);
    }
}
