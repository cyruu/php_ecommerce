
<?php
    
    ?>

<?php

    if(!session_id())
    {
        session_start();
    }
        

    if(isset($_SESSION['login'])&&$_SESSION['login']==true)
    {
        // header("location: login.php?c=none&e=none&p=none");

        //code
            include("sub_files/_dbconnect.php");
        $passed_product_id = $_GET['productid'];//may not require
        $passed_user_id = $_GET['userid'];
        // passed userid product id added
        // detailproduct pgae gas get productcatid productid
        
        //scan all products for checking if already added
        //nedd product cat id from product id
        $sql = "SELECT * FROM `products` WHERE product_id=$passed_product_id";
        $result = mysqli_query($conn,$sql);
        $item=mysqli_fetch_assoc($result);
        // catid used in link
        $category_id = $item['product_cat_id'];
        // this is to pass to deatilproduct page


        //count similar items in cart
        $sql2 = "SELECT * FROM `carts` WHERE cart_product_id=$passed_product_id AND cart_user_id=$passed_user_id";
        $result2 = mysqli_query($conn,$sql2);
        // $item2=mysqli_fetch_assoc($result2);
        $count=mysqli_num_rows($result2);
        if($count==1)
        {
            //error
            header('location: detailproduct.php?productid='.$passed_product_id.'&productcatid='.$category_id.'&added=exist');
        }
        else{
                //add to cart database
            $sql4="INSERT INTO `carts` (`cart_user_id`, `cart_product_id`) VALUES ('$passed_user_id', '$passed_product_id')";
            $result4 = mysqli_query($conn,$sql4);
            
            header('location: detailproduct.php?productid='.$passed_product_id.'&productcatid='.$category_id.'&added=true');
         }
        
        }
        
    
    
?>