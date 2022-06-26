<?php 
    include 'connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Panel</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- customer link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php' ;?>
<div class="container">
    <section class="checkout-form">
        <div class="fonting">COMPLETE YOUR ORDER</div>

        <div class="display-order">

        <?php 
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`") or die("query failed");
            $total=0;
            $grand
        ?>

        </div>

        <form action="" method="post">
            <div class="flex">

                <div class="inputBox">
                    <span>Your name</span>
                    <input type="text" placeholder="Enter your name" name="name" required>
                </div>

                <div class="inputBox">
                    <span>Your phone number</span>
                    <input type="number" placeholder="Enter your phone number" name="phone" required>
                </div>

                <div class="inputBox">
                    <span>Your email</span>
                    <input type="email" placeholder="Enter your phone email" name="email" required>
                </div>

                <div class="inputBox">
                    <span>Payment method</span>
                    <select name="method">
                        <option value="cash on delivery">Cash on delivery</option>
                        <option value="credit cart">Credit cart</option>
                        <option value="paypal">Paypal</option>
                        <option value="paypal">VISA</option>
                        <option value="paypal">Mpay</option>
                        <option value="paypal">BNU</option>
                    </select>
                </div>

                <div class="inputBox">
                <span>Address line 1</span>
                <input type="text" placeholder="e.g. flat no" name="flat" required>
                </div>


                <div class="inputBox">
                <span>Address line 2</span>
                <input type="text" placeholder="e.g. stress name." name="stress" required>
                </div>


                <div class="inputBox">
                <span>City</span>
                <input type="text" placeholder="e.g. Macao" name="city" required>
                </div>


                
                <div class="inputBox">
                <span>State</span>
                <input type="text" placeholder="e.g. Guang Dong" name="state" required>
                </div>

                
                <div class="inputBox">
                <span>Country</span>
                <input type="text" placeholder="e.g. China" name="country" required>
                </div>

                <div class="inputBox">
                <span>Pin code</span>
                <input type="text" placeholder="e.g. 123456" name="pin_code" required>
                </div>

            </div>
            <input type="submit" value="Order now" name="order_btn" class="btn">
        </form>

    </section>
</div>


<!-- customer link -->
<script src="script.js"></script>  
</body>
</html>