<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return response()->json($order);
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
        $validateData = $request->validate([
            'Customer_Name' => 'required',
            'product_id' => 'required',
            'product_Price' => 'required',
            'Payment_status' => 'required',
            'Fulfillment' => 'required'
        ]);

        $order = new Order;
        $order -> Customer_Name = $request-> Customer_Name;
        $order -> product_id = $request -> product_id;
        $order -> product_Price = $request -> product_Price;
        $order -> Payment_status = $request -> Payment_status;
        $order -> Fulfillment = $request -> Fulfillment;
        $order ->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DB::table('orders')->where('id',$id)->first();
        return response()->json($order);
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
        $data = array();
        $data['Customer_Name'] = $request->Customer_Name;
        $data['product_id'] = $request->product_id;
        $data['product_Price'] = $request->product_Price;
        $data['Payment_status'] = $request->Payment_status;
        $data['Fulfillment'] = $request->Fulfillment;
        $update = DB::table('orders')->where('id',$id)->update($data);
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
