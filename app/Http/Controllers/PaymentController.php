<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.payment');
    }

    public function view()
    {
        $payments=Payment::all();
        return view('admin.payments', compact('payments'));
    }

    public function confirm()
    {
        return view('user.confirm');
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
        $request->validate([
            'price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'price' => $request->price,
            'payment_method' => $request->payment_method,
            'status' => 'pending', 
        ]);

        return redirect()->route('confirm')->with('success', 'confirm payment.');
    }

    public function done(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'card_number' => 'required|string|min:16|max:16',
            'card_expiry' => 'required|string',
            'card_cvc' => 'required|string|min:3|max:3',
        ]);

        Payment::updateOrCreate(
            ['user_id' => Auth::user()->id],  // Find the record by user_id
            [
                'status' => 'done',
                'amount' => $validated['amount'],
                'payment_date' => now(),
            ]
        );

        return redirect()->route('addpost')->with('success', 'Payment processed successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
