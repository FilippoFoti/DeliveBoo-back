<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::with(['types', 'dishes']);
        if ($request->has('type_id')) {
            $query->whereHas('types', function ($q) use ($request) {
                $q->whereIn('id', $request->type_id);
            });
        }
        $restaurants = $query->get();
        // $restaurants = Restaurant::with('types','dishes')->get();
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
