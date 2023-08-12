<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $donasi;

    public function __construct($donasi)
    {
        parent::__construct();

        $this->donasi = $donasi;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->donasi->number,
                'gross_amount' => $this->donasi->jumlah,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->donasi->jumlah,
                    'quantity' => 1,
                    'name' => 'Flashdisk Toshiba 32GB',
                ],
            ],
            'customer_details' => [
                'first_name' => 'Martin Mulyo Syahidin',
                'email' => 'mulyosyahidin95@gmail.com',
                'phone' => '081234567890',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}