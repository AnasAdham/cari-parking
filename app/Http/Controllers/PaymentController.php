<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Payment/Index');
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
        $options = array(
            'userSecretKey' => config('toyyibpay.key'),
            'categoryCode' => config('toyyibpay.category'),
            'billName' => 'Parking Fee',
            'billDescription' => 'Fee for parking per minutes',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => 100,
            'billReturnUrl' => route('payment.status'),
            'billCallbackUrl' => route('payment.callback'),
            'billExternalReferenceNo' => 'Bill-1',
            'billTo' => 'John Doe',
            'billEmail' => 'jd@gmail.com',
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

    function status(){
        $response = request()->all([ 'status', 'billcode', 'order_id']);
        return Redirect::route('payment')->with('success', 'Payment Success');
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
