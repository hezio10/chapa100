<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PrincingController extends Controller
{
    public function createPricing(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'transport_type_id' => 'required|exists:transport_types,id',
            'price' => 'required|numeric|min:0',
            'currency' => 'nullable|in:mzn',
            'effective_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:effective_date',
        ]);

        // Create a new pricing entry in the database
        $pricing = Pricing::create($validatedData);

        // Return a response indicating success
        return response()->json([
            'message' => 'Pricing created successfully',
            'data' => $pricing,
        ], 201);
    }
}
