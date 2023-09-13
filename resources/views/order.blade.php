<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
</head>
<body>
    <h1>Detail Transaksi</h1>

    @if(isset($transaction))
        <p><strong>Order ID:</strong> {{ $transaction['order_id'] }}</p>
        <p><strong>Status Code:</strong> {{ $transaction['status_code'] }}</p>
        <p><strong>Transaction Status:</strong> {{ $transaction['transaction_status'] }}</p>
        <p><strong>Total Amount:</strong> {{ $transaction['gross_amount'] }}</p>
        <!-- Tambahkan kode HTML untuk menampilkan data transaksi lainnya jika diperlukan -->
    @else
        <p>Data transaksi tidak ditemukan.</p>
    @endif
</body>
</html>