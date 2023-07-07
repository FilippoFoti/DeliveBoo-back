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
    public function index(Request $request) {
        if($request->has('type_id')){
            $restaurants = Restaurant::with(['type'])->where('type_id', $request->type_id)->paginate(20);
        } else {
            $restaurants = Restaurant::with('types','dishes')->get();
        }
        // $restaurants = Restaurant::with('types','dishes')->get();
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants
        ]);
    }
}
