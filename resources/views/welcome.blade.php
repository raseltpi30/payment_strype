<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Stripe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Payment Form</h2>
    <form id="payment-form" action="{{ route('payment.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item-name">Item Name</label>
            <input type="text" class="form-control" id="item-name" name="item_name" required>
        </div>

        <div class="form-group">
            <label for="total-amount">Total Amount (in USD)</label>
            <input type="number" class="form-control" id="total-amount" name="total_amount" min="0" step="0.01" required>
        </div>

        <!-- Add a hidden input for Stripe Token (if using JavaScript, but here it's omitted) -->
        <input type="hidden" name="stripeToken" id="stripeToken">

        <button type="submit" class="btn btn-primary">Pay</button>
    </form>
</div>
</body>
</html>
