<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgeCreateRequest;
use App\Http\Requests\AgeUpdateRequest;
use App\Models\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ages = Age::all();
        return view('age.index', compact('ages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('age.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgeCreateRequest $request)
    {
        $data = $request->all();
        Age::create($data);
        session()->flash('success', 'Age Created Successfully');
        return redirect(route('age.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Age $age)
    {
        return view('age.create', compact('age'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgeUpdateRequest $request, Age $age)
    {
        $data = $request->all();
        $age->update($data);
        session()->flash('success', 'Age Updated Successfully');
        return redirect(route('age.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Age $age)
    {
        if ($age->products->count() > 0) {
            session()->flash('error', 'Age cannot be deleted because it has some product.');
            return redirect()->back();
        }
        $age->delete();
        session()->flash('success', 'Kategori Deleted Successfully');
        return redirect(route("age.index"));
    }
}
