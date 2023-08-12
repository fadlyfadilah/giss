<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kampanye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Midtrans\Config;
use Midtrans\Snap;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donasis = Donasi::where('user_id', auth()->id())->get();

        return view('donasi', compact('donasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Donasi $donasi)
    {
        $kampanye = Kampanye::where('id', $donasi->kampanye_id)->first();

        return view('detail', compact('donasi', 'kampanye'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        $attr['user_id'] = auth()->id();
        $order = uniqid();
        $attr['order_id'] = $order;
        
        $kampanye = Kampanye::find($request->kampanye_id);
        
        $donasi = Donasi::create($attr);
        
        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat data transaksi
        $transactionDetails = [
            'order_id' => $donasi->order_id,
            'gross_amount' => $request->jumlah,
        ];

        // Detail item
        $items = [
            [
                'id' => $request->kampanye_id,
                'price' => $request->jumlah,
                'quantity' => 1,
                'name' => $kampanye->nama_kampanye,
            ],
        ];
        // Data pelanggan
        $customerDetails = [
            'first_name' => $request->full_name,
            'email' => $request->email,
        ];

        // Persiapan data untuk pembayaran
        $params = [
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
        ];

        try {
            $paymentUrl = Snap::createTransaction($params)->redirect_url;
            return redirect()->away($paymentUrl);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $donasi = Donasi::where('order_id', $request->order_id)->first();
        $kampanye = Kampanye::where('id', $donasi->kampanye_id)->first();

        return view('detail', compact('donasi', 'kampanye'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
