<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(): JsonResponse
    {
        $routes = Route::all();

        return response()->json([
            'message' => 'Routes retrieved successfully',
            'data' => $routes,
        ]);
    }

    public function show(Route $route): JsonResponse
    {
        return response()->json([
            'message' => 'Route retrieved successfully',
            'data' => $route,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'service_type_id' => 'required|exists:service_types,id',
            'origin_id' => 'required|exists:locations,id',
            'destination_id' => 'required|exists:locations,id',
        ]);

        $route = Route::create($validatedData);

        return response()->json([
            'message' => 'Route created successfully',
            'data' => $route,
        ], 201);
    }

    public function update(Request $request, Route $route): JsonResponse
    {
        $validatedData = $request->validate([
            'service_type_id' => 'sometimes|required|exists:service_types,id',
            'origin_id' => 'sometimes|required|exists:locations,id',
            'destination_id' => 'sometimes|required|exists:locations,id',
        ]);

        $route->update($validatedData);

        return response()->json([
            'message' => 'Route updated successfully',
            'data' => $route,
        ]);
    }

    public function destroy(Route $route): JsonResponse
    {
        $route->delete();

        return response()->json([
            'message' => 'Route deleted successfully',
        ]);
    }
}
