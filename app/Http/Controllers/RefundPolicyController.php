<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRefundPolicyRequest;
use App\Models\RefundPolicy;
use Illuminate\Http\Request;

class RefundPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refund_policies = RefundPolicy::all();
        return view('refund_policy.index', compact('refund_policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('refund_policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRefundPolicyRequest $request)
    {
        RefundPolicy::create($request->all());
        session()->flash('success', 'Refund Policy Created Successfully');
        return redirect(route("refund_policy.index"));
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
    public function edit(RefundPolicy $refund_policy)
    {
        return view('refund_policy.create', compact('refund_policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRefundPolicyRequest $request, RefundPolicy $refund_policy)
    {
        $refund_policy->update($request->all());
        session()->flash('success', 'Refund Policy Updated Successfully');
        return redirect(route("refund_policy.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefundPolicy $refund_policy)
    {
        $refund_policy->delete();
        session()->flash('success', 'Refund Policy Deleted Successfully');
        return redirect(route("refund_policy.index"));
    }
}
