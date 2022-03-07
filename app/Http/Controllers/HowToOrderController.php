<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHowToOrderRequest;
use App\Models\HowToOrder;
use Illuminate\Http\Request;

class HowToOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $how_to_orders = HowToOrder::all();
        return view('how_to_order.index',compact('how_to_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('how_to_order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHowToOrderRequest $request)
    {
        $data = $request->all();
        HowToOrder::create($data);
        session()->flash('success', 'HowToOrder Created Successfully');
        return redirect(route('how_to_order.index'));
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
    public function edit(HowToOrder $how_to_order)
    {
        return view('how_to_order.create', compact('how_to_order'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateHowToOrderRequest $request, HowToOrder $how_to_order)
    {
        $data = $request->all();
        $how_to_order->update($data);
        session()->flash('success', 'How To Order Updated Successfully');
        return redirect(route('how_to_order.index'));
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
