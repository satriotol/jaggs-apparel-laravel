<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHomeRequest;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Home $home)
    {
        return view('home.create', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        $data = $request->all();
        if ($request->hasFile('background')) {
            $background = $request->background->store('gallery', 'public');
            $home->deleteBackground();
            $data['background'] = $background;
        };
        if ($request->hasFile('logo')) {
            $logo = $request->logo->store('gallery', 'public');
            $home->deleteLogo();
            $data['logo'] = $logo;
        };
        $home->update($data);
        session()->flash('success', 'About Updated Successfully');
        return redirect(route("home.edit", 1));
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
