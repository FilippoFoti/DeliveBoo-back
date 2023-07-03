<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use Illuminate\Http\Request;

class DisheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishe::all();

        return view('admin.dishes.index', compact('dishes'));
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
    public function store(Request $request)
    {
        $dishe = new Dishe();
        $dishe->name = $request->input('name');
        $dishe->price = $request->input('price');
        $dishe->description = $request->input('description');
        $dishe->visibility = $request->input('is_visible');
        

        $dishe->save();
        return redirect()->route('admin.dishes.index')->with('message', '{$dishe->name} è stato creato');
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
        return view("admin.dishes.show", compact("dishe"));
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
        return view ("admin.dishes.edit", compact("dishe"));
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
        $data = $request->all();
        $dishe = Dishe::findOrFail($id);
        $dishe->update($data);
        return redirect()->route('admin.dishes.index')->with('message', '{$dishe->name} è stato modificato');
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
