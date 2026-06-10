<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $serviceTypes = ServiceType::all();

        return response()->json([
            'message' => 'Service types retrieved successfully',
            'data' => $serviceTypes,
        ]);
    }

    public function show(ServiceType $serviceType): JsonResponse
    {
        return response()->json([
            'message' => 'Service type retrieved successfully',
            'data' => $serviceType,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
            'descrtiption' => 'nullable|string',
        ]);

        $serviceType = ServiceType::create($validatedData);

        return response()->json([
            'message' => 'Service type created successfully',
            'data' => $serviceType,
        ], 201);
    }

    public function update(Request $request, ServiceType $serviceType): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:45',
            'descrtiption' => 'sometimes|nullable|string',
        ]);

        $serviceType->update($validatedData);

        return response()->json([
            'message' => 'Service type updated successfully',
            'data' => $serviceType,
        ]);
    }

    public function destroy(ServiceType $serviceType): JsonResponse
    {
        $serviceType->delete();

        return response()->json([
            'message' => 'Service type deleted successfully',
        ]);
    }
}
