<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionsDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    //
    public function process(Request $request)
    {
        //save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));
        //proses checkout
        $code = 'STORE-'.mt_rand(00000,99999);
        $carts = Cart::with(['product','user'])
                ->where('users_id',Auth::user()->id)
                ->get();

        //transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        //transaction details
        foreach ($carts as $cart){
            $trx = 'TRX-'.mt_rand(00000,99999);
            TransactionsDetail::create([
            'transactions_id' => $transaction->id,
            'products_id' => $cart->product->id,
            'price' =>  $cart->product->price,
            'shipping_status' => 'PENDING',
            'resi' => '',
            'code' => $trx,
        ]);
        }
        //delete carts
        Cart::where('users_id', Auth::user()->id)
            ->delete();
        //konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSantized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        //buat array untuk dikirim ke midtrans
        $midtrans = [
            "transaction_details" => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            "customer_details" => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            "enabled_payments" => [
                'gopay','bank_transfer'
            ],
            'vtweb' => []
            ];
            try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
             // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            }
            catch (Exception $e) {
            echo $e->getMessage();
            }
    }
    public function callback(Request $request)
    {
        //set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSantized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');
        //instance midtrans notification
        $notification = new Notification();
        //assign ke variable
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;
        //cari transaksi berdasarkan id
        $transaction = Transaction::findOrFail($order_id);
        //handle notification status
        if ($status == 'capture') {
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'SUCCESS';
                }
            }
        }
        //simpan transaksi
         elseif ($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }
        elseif($status == 'pending'){
            $transaction->status = 'PENDING';
        }
        elseif ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        }
        elseif ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        }
        elseif ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        $transaction->save();
    }
}
