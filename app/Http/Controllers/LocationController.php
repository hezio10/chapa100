<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = Location::all();

        return response()->json([
            'message' => 'Locations retrieved successfully',
            'data' => $locations,
        ]);
    }

    public function show(Location $location): JsonResponse
    {
        return response()->json([
            'message' => 'Location retrieved successfully',
            'data' => $location,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
            'type' => 'required|string|in:cidade,distrito,terminal,bairro',
            'province_id' => 'required|exists:provinces,id',
        ]);

        $location = Location::create($validatedData);

        return response()->json([
            'message' => 'Location created successfully',
            'data' => $location,
        ], 201);
    }

    public function update(Request $request, Location $location): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:45',
            'type' => 'sometimes|required|string|in:cidade,distrito,terminal,bairro',
            'province_id' => 'sometimes|required|exists:provinces,id',
        ]);

        $location->update($validatedData);

        return response()->json([
            'message' => 'Location updated successfully',
            'data' => $location,
        ]);
    }

    public function destroy(Location $location): JsonResponse
    {
        $location->delete();

        return response()->json([
            'message' => 'Location deleted successfully',
        ]);
    }
}
