<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $restaurants = Restaurant::where("user_id", $userId)->get();

        return view('admin.dashboard', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        if (Auth::user()->restaurant) {
            return redirect()->route('admin.dashboard')->with('message', "Hai già un ristorante");
        } else {
            return view('admin.restaurants.create', compact('types'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');
        $restaurant->vat_number = $request->input('vat_number');
        $restaurant->user_id = $request->input('user_id');
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('restaurantImg', $request->image);
            $restaurant->image = $path;
        } else {
            $restaurant->image = 'restaurantImg/default.jpeg';
        }

        $restaurant->save();
        $typeIds = $request->input('type_id');
        $types = Type::whereIn('id', $typeIds)->get();

        $restaurant->types()->sync($types);

        return redirect()->route('admin.dashboard')->with('message', "{$restaurant->name} è stato creato!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
