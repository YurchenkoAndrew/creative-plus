<?php

namespace App\Http\Controllers;

use App\Models\PortfolioBlock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return \response()->json(PortfolioBlock::with('items')->orderBy('sort')->get(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param PortfolioBlock $portfolioBlock
     * @return Response
     */
//    public function show(PortfolioBlock $portfolioBlock)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PortfolioBlock $portfolioBlock
     * @return Response
     */
//    public function edit(PortfolioBlock $portfolioBlock)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PortfolioBlock $portfolioBlock
     * @return Response
     */
//    public function update(Request $request, PortfolioBlock $portfolioBlock)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PortfolioBlock $portfolioBlock
     * @return Response
     */
//    public function destroy(PortfolioBlock $portfolioBlock)
//    {
//        //
//    }
}
