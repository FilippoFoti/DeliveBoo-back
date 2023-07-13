<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDisheRequest;
use App\Http\Requests\UpdateDisheRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DisheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishe::where('restaurant_id', Auth::user()->restaurant->id)->orderByRaw("LOWER(name)")->get();
        $shortDescription = [];

        foreach ($dishes as $dishe) {
            $shortDescription[] = Str::limit($dishe->description, 10, '...');
        }


        return view('admin.dishes.index', compact('dishes', 'shortDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisheRequest $request)
    {
        // $userId = Auth::user()->id;
        // $id_restaurant = Restaurant::findOrFail($userId)->id;
        $dishe = new Dishe();
        $dishe->restaurant_id = Auth::user()->restaurant->id;
        $dishe->name = $request->input('name');
        $dishe->price = $request->input('price');
        $dishe->description = $request->input('description');
        $dishe->visibility = $request->input('is_visible');
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('disheImg', $request->image);
            $dishe->image = $path;
        } else {
            $dishe->image = 'disheImg/dishe_default.jpeg';
        }

        $dishe->save();
        return redirect()->route('admin.dishes.index')->with('message', "{$dishe->name} è stato creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishe = Dishe::findOrFail($id);

        $userId = Auth::user()->id;
        $restaurant_id = Dishe::findOrFail($id)->restaurant_id;

        if ($userId === $restaurant_id) {
            return view("admin.dishes.show", compact("dishe"));
        } else {
            return redirect()->route("admin.dashboard")->with("message", "Non puoi visualizzare questo piatto, non fa parte del menù del tuo ristorante");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dishe = Dishe::findOrFail($id);
        $userId = Auth::user()->id;
        $restaurant_id = Dishe::findOrFail($id)->restaurant_id;
        if ($userId === $restaurant_id) {
            return view("admin.dishes.edit", compact("dishe"));
        } else {
            return redirect()->route("admin.dashboard")->with("message", "Non puoi modificare questo piatto, non fa parte del tuo ristorante");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisheRequest $request, $id)
    {
        $data = $request->validated();
        $dishe = Dishe::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('disheImg', $request->image);
            $dishe->image = $path;
        }

        $dishe->update($data);
        return redirect()->route('admin.dishes.index')->with('message', "{$dishe->name} è stato modificato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dishe $dishe)
    {
        $dishe->delete();
        return redirect()->route('admin.dishes.index')->with('message', "{$dishe->name} è stato cancellato");
    }
}
