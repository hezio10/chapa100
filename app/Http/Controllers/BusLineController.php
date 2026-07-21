<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\ListBusLinesResource;
use App\Http\Resources\V1\ShowBusLineResource;
use App\Models\BusLine;
use App\Models\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusLineController extends Controller
{
    public function index(Request $request)
    {
        if($request->originBuslineId && $request->destinationBuslineId) {
             $busLines = BusLine::where('origin_id', $request->originBuslineId)
                                ->where('destination_id', $request->destinationBuslineId)
                                ->get()[0];

            DB::table('most_popular_buslines')->updateOrInsert(
                ['bus_line_id' => $busLines->id],
                ['total' => DB::raw('total + 1')],
            );
            
            return response()->json([
                'message' => '',
                'data' => new ShowBusLineResource($busLines),
            ]);
        }

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

    public function getMostPopularBusLines(): JsonResponse
    {
        $busLines = BusLine::query()
                    ->join('most_popular_buslines','bus_lines.id', '=', 'most_popular_buslines.bus_line_id')
                    ->select('bus_lines.*', 'most_popular_buslines.total')
                    ->orderBy('most_popular_buslines.total', 'desc')
                    ->limit(5)
                    ->get();

        return response()->json([
            'message' => 'Route retrieved successfully',
            'data' => new ListBusLinesResource($busLines),
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
