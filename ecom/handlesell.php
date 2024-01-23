<?php
//session

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        if(!session_id())
        {
            session_start();
        }
        include("sub_files/_dbconnect.php");
        $user_name = $_SESSION['username'];

        //user id form usernmae
        $sql3 = "SELECT * FROM `users` WHERE user_name='$user_name'";
        $result3 = mysqli_query($conn,$sql3);
        $item3 = mysqli_fetch_assoc($result3);

        $user_id =  $item3['user_id'];


        $productname=$_POST["productname"];
        $productdesc=$_POST["productdesc"];
        $productprice=$_POST["productprice"];
        $productrating=$_POST["productrating"];
        $productcategory=$_POST["productcategory"];
        $producturl=$_POST["producturl"];

        //category id uising category name
        $sql2 = "SELECT * FROM `categories` WHERE category_name='$productcategory'";
        $result2 = mysqli_query($conn,$sql2);
        $item2 = mysqli_fetch_assoc($result2);
        $product_cat_id = $item2['category_id'];
        // echo $productname;
        // echo $productdesc;
        // echo $productprice;
        // echo $productrating;
        // echo $productcategory;
        // echo $producturl;
        // echo $productfile;

        
        //sql to insert to product table
        
        $sql="INSERT INTO `products` (`product_title`, `product_desc`, `product_price`, `product_by`, `product_image`, `product_cat_id`, `product_rating`) VALUES ('$productname', '$productdesc', '$productprice', '$user_id', '$producturl', '$product_cat_id', '$productrating');";
        $result = mysqli_query($conn,$sql);
        
        header("location: userproducts.php?a=added&r=none");
    }


?>