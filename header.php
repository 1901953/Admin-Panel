<?php
    @include 'connect_db.php';



    if(isset($_POST['Search_submit'])){
        $navbar_find = $_POST['navbar_find'];

        $product_search = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$navbar_find' ");

        
        if($product_search){
            // header('location:products.php');
            $product_only = mysqli_query($conn,"SELECT * FROM `products` WHERE name = '$navbar_find' ");
        }else{
                $message[]= "Have not the Product";
        }
    }










?>





<?php 
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}


?>
<header class="header">
    <div class="flex">
        <a href="#" class="logo">Foodies</a>
        <div class="navbar_container">
            <h1 class="navbar_style">Navigation Bar</h1>
            <form action="" method="post" class="navbar_search">
                <input type="text"  name="navbar_find"  value="<?php if(isset($navbar_find)){ echo $_GET['navbar_find']; }?>" placeholder="Search ...">
                <input type="submit"  name="Search_submit" value="Search" class="search_button">
            </form>

        </div>
        <nav class="navbar">
            <a href="admin_me.php">Add products</a>
            <a href="products.php">View products</a>
        </nav>
        <?php
      
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $grand_sum= 0;
            if(mysqli_num_rows($select_rows) > 0){
                while($select_query = mysqli_fetch_assoc($select_rows)){
                    $itmes_sum = $select_query['quantity'] ;
                    $grand_sum = $itmes_sum + $grand_sum;
                }
            }
            
        ?>


        <a href="cart.php" class="cart">cart <span><?php echo $grand_sum; ?></span> </a>

        <div id="menu-btn" class="fas fa-bars"></div>
    </div>
</header>