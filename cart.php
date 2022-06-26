<?php
    include 'connect_db.php';

    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        $remove_query = mysqli_query($conn,"DELETE FROM `cart` WHERE id = $remove_id") or die('query failed');

        if($remove_query){
            header('location:cart.php');
            $message[] = "cart item has been deleted";
        }else{
            header('location:cart.php');
            $message[]= "cart item already deleted";
        }
    }


    if(isset($_GET['delete_all'])){
        $delete_all_query = mysqli_query($conn, "DELETE  FROM `cart`") or die('query failed');

        if($delete_all_query){
            header('location:cart.php');
            $message[] = 'All item have been delete !';
        }else{
            header('location:cart.php');
            $message[] = 'All item already delete !';
        }
    }


    if(isset($_POST['update_update_btn'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_query = mysqli_query($conn,"UPDATE `cart` SET quantity = '$update_value' WHERE id = $update_id");

        if($update_query){
            header("location:cart.php");
            $message[]="Update item successfully";
        }else{
            header("location:cart.php");
            $messgae[]="Item already update!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- customer link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"> <span>'.$message.'</span><i class="fas fa-times" onclick="this.parent.Element.style.display=`none`;"></i></div>';
    }
}

?>

<script>
    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php include 'header.php'; ?>

<div class="container">
    <section class="shopping-cart">
    <h1 class="heading_cart">Shopping Cart</h1>
    <table>
    <thead>
        <th>image</th>
        <th>name</th>
        <th>price</th>
        <th>quantity</th>
        <th>total price</th>
        <th>action</th>
    </thead>

    <tbody>
        <?php
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
        $grand_total= 0;
        if(mysqli_num_rows($select_cart) > 0){
            while($cart_query = mysqli_fetch_assoc($select_cart)){
        ?>

        <tr>
            <td><img src="uploaded_img/<?php echo $cart_query['image'] ;?>" alt=""></td>
            <td><?php echo $cart_query['name']?></td>
            <td>$<?php echo $cart_query['price']?>/-</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="update_quantity_id" value="<?php echo $cart_query['id']?>">
                    <input type="number" name="update_quantity" min= "1" value="<?php echo $cart_query['quantity']?>">
                    <input type="submit" name="update_update_btn" value="update">
                </form>
            </td>
            <td>$<?php echo $sub_total= number_format($cart_query['price']) * $cart_query['quantity']; ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $cart_query['id']; ?>"onclick="return confirm('remove item from cart?')" class="delete-btn" ><i class="fas fa-trash"></i> Remove</a></td>
        </tr>


        <?php
            $grand_total +=$sub_total;
            };
        };
        ?>
        <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continue shopping</a></td>
            <!-- colspan的意思就是 等於excel表格裏面的 多個表格聯合成一個大表格 -->
            <td colspan="3" class="">Grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure want to delete all ?')" class="delete-btn" ><i class="fas fa-trash"> Delete all</i></a></td>
        </tr>


    </tbody>
    </table>

    <div class="checkout-btn">
        <!-- class裏面設置一個三元法則，如果是true的話 btn+""=btn，如果是false的話 btn就會進入一個特意為disable設置的css樣式,這個樣式在style.css -->
        <a href="checkout.php" class="btn <?= ($grand_total >1)?'':'disable';?>">Checkout</a>
    </div>

    </section>

</div>


<!-- customer link -->
<script src="script.js"></script>  
</body>
</html>