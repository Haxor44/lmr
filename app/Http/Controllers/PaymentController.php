<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('payment'); 
    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $booking = Booking::findOrFail($request->booking);
        return view('payments.create',compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'booking_id'=>'required|exists:bookings,id',
            'payment_type'=>'required|string',
            'details'=>'required|json',
        ]);

        //Generating a unique id fro transactions
        $transactionId = 'PAY-' . strtoupper(Str::random(10));

        $payment = auth()->user()->payments()->create([
            'transaction_id'=> $transactionId,
            'payment_type'=>$validated['payment_type'],
            'details'=>$validated['details'],
        ]);

        return redirect()->route('payments.show',$payment)
            ->with('success','PAyment processed successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // redirects to confirmation
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
