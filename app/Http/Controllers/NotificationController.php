<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kampanye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Midtrans\Config;
use Midtrans\Snap;

class NotificationController extends Controller
{
    public function handleNotification(Request $request)
    {
        // Ambil data notifikasi dari Midtrans
        $notificationData = $request->all();

        // Proses data notifikasi dan update status transaksi
        $order_id = $notificationData['order_id'];
        $transaction_status = $notificationData['transaction_status'];

        $transaction = Donasi::where('order_id', $order_id)->first();

        $transaction->order_id = $order_id;
        $transaction->full_name = $transaction->full_name;
        $transaction->email = $transaction->email;
        $transaction->jumlah = $transaction->jumlah;
        $transaction->note = $transaction->note;
        $transaction->user_id = $transaction->user_id;
        $transaction->kampanye_id = $transaction->kampanye_id;
        $transaction->status = $transaction_status;
        
        $transaction->save();

        // Berikan respons OK ke Midtrans
        return response()->json(['status' => 'OK']);
    }
}
