<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-content">
        <div class="company__info">
            <h2 class="company_title">Train Reservation</h2>
        </div>
        <div class="login_form">
            <h2 class="title">Payment Details for Train Reservation</h2>
            <form id="paymentForm" onsubmit="confirmPayment(event)">
                <input type="hidden" name="trainId" id="trainId" value="<?php echo htmlspecialchars($_GET['trainId']); ?>">
                <div class="form__input">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form__input">
                    <label for="creditCard">Credit Card Number:</label>
                    <input type="text" id="creditCard" name="creditCard" required>
                </div>
                <button type="submit" class="btn">Confirm Payment</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
