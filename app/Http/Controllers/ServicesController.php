<?php

namespace App\Http\Controllers;

use App\Models\AdditionalService;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    public function getServices(): JsonResponse
    {
        return response()->json(Service::all()->values(), Response::HTTP_OK);
    }

    public function getAdditionalServices(): JsonResponse
    {
        return response()->json(AdditionalService::all(), Response::HTTP_OK);
    }
}
