<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .receipt-container {
            width: 300px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 10px;
        }
        .receipt-details {
            margin-bottom: 10px;
        }
        .receipt-details p {
            margin: 5px 0;
        }
        .receipt-footer {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h2>Receipt</h2>
        </div>
        <div class="receipt-details">
            <p>Total: ${{ $receiptData['total'] }}</p>
            <p>Cash Received: ${{ $receiptData['cash'] }}</p>
            <p>Change: ${{ $receiptData['change'] }}</p>
            <!-- Add more details as needed -->
        </div>
        <div class="receipt-footer">
            Thank you for your purchase!
        </div>
    </div>
    <a href="/cashier">Go back</a>
</body>
</html>
