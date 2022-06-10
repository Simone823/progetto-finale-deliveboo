<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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

        // $request->validate([
        //     'guest_name' => 'required'
        // ]);

        // Data request all
        $data = $request->all();

        // Total 
        $total = $data['total'];

        foreach($data as $el) {

            // New order
            $order =  new Order();

            // Order fill
            $order->fill($el);

            // Order total price
            $order->total_price = $total;

            // Order user_id foreach data cart
            foreach($data['cart'] as $plate) {
                $order->user_id = $plate['user_id'];
            }
            
            // Order save
            $order->save();
            
            // Attach plates pivot
            foreach($data['cart'] as $plate) {
                $order->plates()->attach($plate['id']);
            }

            return response()->json([
                'order' => $order,
                'success' => true
            ]);
        };
       
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
