<?php

namespace App\Http\Controllers;

use App\Models\TransportType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransportTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $transportTypes = TransportType::all();

        return response()->json([
            'message' => 'Transport types retrieved successfully',
            'data' => $transportTypes,
        ]);
    }

    public function show(TransportType $transportType): JsonResponse
    {
        return response()->json([
            'message' => 'Transport type retrieved successfully',
            'data' => $transportType,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
            'capacity' => 'required|integer|min:0',
        ]);

        $transportType = TransportType::create($validatedData);

        return response()->json([
            'message' => 'Transport type created successfully',
            'data' => $transportType,
        ], 201);
    }

    public function update(Request $request, TransportType $transportType): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:45',
            'capacity' => 'sometimes|required|integer|min:0',
        ]);

        $transportType->update($validatedData);

        return response()->json([
            'message' => 'Transport type updated successfully',
            'data' => $transportType,
        ]);
    }

    public function destroy(TransportType $transportType): JsonResponse
    {
        $transportType->delete();

        return response()->json([
            'message' => 'Transport type deleted successfully',
        ]);
    }
}
