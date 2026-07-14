<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\ListBusLinesResource;
use App\Http\Resources\V1\ShowBusLineResource;
use App\Models\BusLine;
use App\Models\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BusLineController extends Controller
{
    public function index(): JsonResponse
    {
        $routes = BusLine::all();

        return response()->json([
            'message' => 'Routes retrieved successfully',
            'data' => new ListBusLinesResource($routes),
        ]);
    }

    public function show(BusLine $route): JsonResponse
    {
        return response()->json([
            'message' => 'Route retrieved successfully',
            'data' => new ShowBusLineResource($route),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'service_type_id' => 'required|exists:service_types,id',
            'origin_id' => 'required|exists:locations,id',
            'destination_id' => 'required|exists:locations,id',
        ]);

        $route = BusLine::create($validatedData);

        return response()->json([
            'message' => 'Route created successfully',
            'data' => new ShowBusLineResource($route),
        ], 201);
    }

    public function update(Request $request, BusLine $route): JsonResponse
    {
        $validatedData = $request->validate([
            'service_type_id' => 'sometimes|required|exists:service_types,id',
            'origin_id' => 'sometimes|required|exists:locations,id',
            'destination_id' => 'sometimes|required|exists:locations,id',
        ]);

        $route->update($validatedData);

        return response()->json([
            'message' => 'Route updated successfully',
            'data' =>new ShowBusLineResource($route),
        ]);
    }

    public function destroy(BusLine $route): JsonResponse
    {
        $route->delete();

        return response()->json([
            'message' => 'Route deleted successfully',
        ]);
    }
}
