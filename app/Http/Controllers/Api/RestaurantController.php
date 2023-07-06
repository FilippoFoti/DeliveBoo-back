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
    public function index() {
        $restaurants = Restaurant::with('types','dishes')->get();
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants
        ]);
    }
}
