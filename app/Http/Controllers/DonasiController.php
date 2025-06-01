<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class DonasiController extends Controller
{
    public function getToken(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $amount = (int) $request->input('amount');
        $orderId = 'DONASI-' . uniqid();

        // Simpan transaksi ke DB
        DB::table('donasis')->insert([
            'order_id' => $orderId,
            'amount' => $amount,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name ?? 'Guest',
                'email' => auth()->user()->email ?? 'guest@example.com',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'token' => $snapToken,
            'order_id' => $orderId
        ]);
    }

    // Webhook: Midtrans kirim notifikasi perubahan status transaksi
    public function handleCallback(Request $request)
{
    $data = $request->all();
    \Log::info('Webhook Masuk:', $data);

    $orderId = $data['order_id'] ?? null;
    $status = $data['transaction_status'] ?? null;

    if ($orderId && $status) {
        $updated = DB::table('donasis')
            ->where('order_id', $orderId)
            ->update([
                'status' => $status === 'capture' ? 'settlement' : $status,
                'updated_at' => now()
            ]);

        \Log::info("OrderID: $orderId | Status: $status | Rows updated: $updated");
    }

    return response()->json(['message' => 'Callback processed']);
}

}
