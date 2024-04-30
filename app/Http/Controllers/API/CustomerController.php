<?php

namespace App\Http\Controllers\API;

use App\Models\mCustomer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(mCustomer::latest()->get());
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
     * @param  \App\Models\mCustomer  $mCustomer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = mCustomer::select('id', 'code', 'name')
                            ->where('code', 'LIKE', '%'.$request->get('name').'%')
                            ->orWhere('name', 'LIKE', '%'.$request->get('name').'%')
                            ->get();
                            
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mCustomer  $mCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mCustomer $mCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mCustomer  $mCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(mCustomer $mCustomer)
    {
        //
    }
}
