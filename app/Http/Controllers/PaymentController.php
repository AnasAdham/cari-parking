<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($payment_details)
    {

        return Inertia::render('Payment/Index', [
            'payment' => Payment::with('reservation')->find($payment_details)
        ]);
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
            'id' => 'required',
            'fee' => 'required',
            'user_id' => 'required',
            'reservation_id' => 'required'
        ]);
        $user = User::find($request->user_id);
        $options = array(
            'userSecretKey' => config('toyyibpay.key'),
            'categoryCode' => config('toyyibpay.category'),
            'billName' => 'Parking Fee',
            'billDescription' => 'Fee for parking per minutes',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $request->fee * 100,
            'billReturnUrl' => route('payment.status'),
            'billCallbackUrl' => route('payment.callback'),
            'billExternalReferenceNo' => $request->id,
            'billTo' => $user->name,
            'billEmail' => $user->email,
            'billPhone' => '0194342411',
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => 0,
            'billContentEmail' => 'Thank you for purchasing our product!',
            'billChargeToCustomer' => 2
        );
        $url = "https://dev.toyyibpay.com/index.php/api/createBill";
        $response = Http::asForm()->post($url, $options);
        $billCode = $response[0]['BillCode'];

        return Inertia::location('https://dev.toyyibpay.com/' . $billCode);
    }

    function status(Request $request){
        $status_id = $request->status_id;
        $payment = Payment::find($request->order_id);

        if ($status_id == 1 || $status_id == 2) {
            $payment->status = "Paid";
            $payment->save();
            return Redirect::route('payment.showAll')->with('success', 'Payment success!!');

        } else if ($status_id == 3) {
            return Redirect::route('payment.showAll')->with('error', 'Payment failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Payment/Show');
    }
    public function showAllPayment()
    {
        $id = Auth::user()->id;
        return Inertia::render('Payment/Show', [
            'payments' => Payment::where('user_id', $id)
                ->with('reservation')
                ->paginate(8),
        ]);
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
