

<?php
    // passed product id
    
    
    include("sub_files/_dbconnect.php");
    if(!session_id())
      {
        session_start();
      }
    $passed_product_id = $_GET['p'];
    $user_name = $_SESSION['username'];
    //user id from usernmae
    $sql3 = "SELECT * FROM `users` WHERE user_name='$user_name'";
    $result3 = mysqli_query($conn,$sql3);
    $item3 = mysqli_fetch_assoc($result3);

    $user_id =  $item3['user_id'];
    // echo $passed_product_id;
    // $passed_user_id = $_GET['userid'];
    // delete to from database
    $sql4="DELETE FROM `products` WHERE `products`.`product_id` = $passed_product_id AND `products`.`product_by` = $user_id";
    $result4 = mysqli_query($conn,$sql4);
    // //nedd product name from product id
   
    header("location: userproducts.php?a=none&r=removed");
    
    
?>