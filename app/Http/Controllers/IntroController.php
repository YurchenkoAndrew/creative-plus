<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param Intro $intro
     * @return JsonResponse
     */
    public function show(Intro $intro): JsonResponse
    {
        return response()->json($intro->first(), Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Intro $intro
     * @return \Illuminate\Http\Response
     */
//    public function edit(Intro $intro)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Intro $intro
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Intro $intro)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Intro $intro
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Intro $intro)
//    {
//        //
//    }
}
