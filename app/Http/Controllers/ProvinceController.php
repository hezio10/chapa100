<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(): JsonResponse
    {
        $provinces = Province::all();

        return response()->json([
            'message' => 'Provinces retrieved successfully',
            'data' => $provinces,
        ]);
    }

    public function show(Province $province): JsonResponse
    {
        return response()->json([
            'message' => 'Province retrieved successfully',
            'data' => $province,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
        ]);

        $province = Province::create($validatedData);

        return response()->json([
            'message' => 'Province created successfully',
            'data' => $province,
        ], 201);
    }

    public function update(Request $request, Province $province): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:45',
        ]);

        $province->update($validatedData);

        return response()->json([
            'message' => 'Province updated successfully',
            'data' => $province,
        ]);
    }

    public function destroy(Province $province): JsonResponse
    {
        $province->delete();

        return response()->json([
            'message' => 'Province deleted successfully',
        ]);
    }
}
