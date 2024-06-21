<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        .receipt-container {
            width: 350px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .receipt-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .receipt-header h2 {
            margin: 0;
            font-size: 18px;
            color: #777;
        }

        .receipt-details {
            margin-bottom: 20px;
        }

        .receipt-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .receipt-footer p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .receipt-footer .notice {
            font-size: 12px;
            color: #999;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            text-decoration: none;
            color: #007BFF;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h1>ShopNinja</h1>
            <h2>Receipt</h2>
        </div>
        <div class="receipt-details">
            <p><strong>Total:</strong> ${{ $receiptData['total'] }}</p>
            <p><strong>Cash Received:</strong> ${{ $receiptData['cash'] }}</p>
            <p><strong>Change:</strong> ${{ $receiptData['change'] }}</p>
        </div>
        <div class="receipt-footer">
            <p>Thank you for your purchase!</p>
            <p class="notice">Please keep this receipt for your records.</p>
        </div>
    </div>
    <a href="/cashier" class="back-link">Go back</a>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.print();
    });
</script>
</html>
